<?php

namespace App\Http\Controllers;

use App\Models\Applications;
use App\Models\Category;
use App\Models\Question;
use Illuminate\Http\Request;
use Laravel\Ui\Presets\React;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Carbon\Carbon;
class JobsController extends Controller
{
    //

    public function __construct()
    {   
        $this->middleware('auth');
    }
    public function apply_jobs_page(){
        $categories = Category::all();
        $data = [
            'category' => $categories
        ];
        return view('dashboard.jobs.apply')->with($data);
    }

    public function save_application(Request $request){
        // echo dd($request->all());exit();
        $validator = Validator::make($request->all(), [
            "name" => 'required|max:255',
            "email" => 'required|max:255',
            "position" => 'required|max:255',
            "category" => 'required',
            "dob" => 'required',
            "phone" => 'required|max:255',
            "nokphone" => 'required|max:255',
            "gender" => 'required|string|max:255',
            "marital_status" => 'required|max:255',
            "social_media" => 'required|max:255',
            "salary" => 'required|max:255',
            "address" => 'required',
            "history" => 'required',
            "qualification" => 'required',
            "certification" => 'required',
            "qualified" => 'required',
            "referees" => 'required',
        ]);

    
        if ($validator->fails()) {
            toastr()->error('Validation Error Ocurred');
            return back()->withErrors($validator)->withInput();
        }

        $job_application = new Applications();
        $job_application->name = $request->input('name') ;
        $job_application->email = $request->input('email');
        $job_application->position = $request->input('position');
        $job_application->category = $request->input('category');
        $job_application->dob = $request->input('dob');
        $job_application->phone = $request->input('phone');
        $job_application->altphone = $request->input('altphone');
        $job_application->nokphone = $request->input('nokphone');
        $job_application->gender = $request->input('gender');
        $job_application->marital_status = $request->input('marital_status');
        $job_application->social_media = $request->input('social_media');
        $job_application->salary = $request->input('salary');
        $job_application->address = $request->input('address');
        $job_application->history = $request->input('history');
        $job_application->qualification = $request->input('qualification');
        $job_application->certification = $request->input('certification');
        $job_application->referees = $request->input('referees');
        $job_application->qualified = $request->input('qualified');

        $job_application->user_id = Auth('web')->user()->id;
        $job_application->code = "KAN-" . Str::random(8);
        $save_Details = $job_application->save();

        if($save_Details){
            toastr()->success('Thanks for applying for a Job. Please take the assessment in view Applications');
            return back();
        }else{
             toastr()->error("Sorry an Error Occured, Please try again later");
             return back();
        }  
    }

    public function view_applications(){
        // get all the job applications 
        $user_id = Auth('web')->user()->id;

        $get_jobs = DB::table('applications')->where('applications.user_id',$user_id)->join('categories', 'applications.category', '=', 'categories.id')
        ->select('applications.*', 'categories.name as category_name')->get();

        // echo dd($get_jobs); exit();

        $data = [
            "applications" => $get_jobs
        ];
        return view('dashboard.jobs.view')->with($data);
    }

    public function view_one_application($code){
        
        // dd($code);
        $job_application = DB::table('applications')->where("applications.code",$code)->join('categories', 'applications.id', '=', 'categories.id')
        ->select('applications.*', 'categories.name as category_name')->get();;
        
        // echo dd($job_application);
        if(count($job_application) == 0){
            toastr()->error("Invalid Job Application Code Provided");
            return redirect()->route('view-applications');
        }

        $data = [
            'job_application' => $job_application
        ];

        return view('dashboard.jobs.view-one')->with($data);
    }

    public function fetch_job_test($category_id){
        $tests = Question::where('category_id',$category_id)->get();

        $data = [
            'tests' => $tests
        ];

        return view('dashboard.jobs.view-test')->with($data);
    }
}
