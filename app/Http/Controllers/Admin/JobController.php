<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Applications;
use Illuminate\Support\Facades\Mail;
use App\mail\JobApplicationRejected;
use App\mail\JobApplicationAccepted;

class JobController extends Controller
{
    // fetch all the job applications 

    public function fetch_job_applications(){
        $fetch_all_job_applications = DB::table('applications')->join('categories', 'applications.id', '=', 'categories.id')
        ->select('applications.*', 'categories.name as category_name')->get();

        // echo dd($fetch_all_job_applications); exit();

        $data = [
            "applications" => $fetch_all_job_applications
        ];
        return view('admin.jobs.view')->with($data);
    }

    public function fetch_one_job_application($code){
        $job_application = DB::table('applications')->where("applications.code",$code)->join('categories', 'applications.id', '=', 'categories.id')
        ->select('applications.*', 'categories.name as category_name')->get();;
        
        // echo dd($job_application);
        if(count($job_application) == 0){
            toastr()->error("Invalid Job Application Code Provided");
            return redirect()->route('admin.job_applications');
        }

        $data = [
            'job_application' => $job_application
        ];

        return view('admin.jobs.view-one')->with($data);
    }

    public function approve($id){
        if(!isset($id)){
            toastr()->error('Invalid Format for approving record!');
            return back();
        }

        $job_application = Applications::where('id',$id)->where('status','2')->orWhere('status','0')->get(); 
        // pending = 2 ; approved = 1; rejected = 0

        // dd($job_application);
        if(!$job_application || count($job_application) == 0){
            toastr()->error('Sorry the approved has already been deleted or doesnt exist');
            return back();
        }

        $approve_job_application = $job_application[0]->update([
            'status' => '1'
        ]);

        if(!$approve_job_application){
            toastr()->error('Sorry the Job Application could not be approved, try again later');
            return back();
        }

        toastr()->success('Job Application has been approved Successfully');
        $data = [
            'email' => $job_application[0]->email,
            'name' => $job_application[0]->name,
            'post' => $job_application[0]->position,
            'code' => $job_application[0]->code,
            'date' => $job_application[0]->created_at
        ];
        $email = $job_application[0]->email;

        Mail::to($email)->send(new JobApplicationAccepted($data));
        
        toastr()->success('An E-mail has been sent to the applicant via-' . $email);
        return back();
    }

    public function reject($id){
        // dd($id);
        if(!isset($id)){
            toastr()->error('Invalid Format for rejecting record!');
            return back();
        }

        $job_application = Applications::where('id',$id)->where('status','2')->orWhere('status','1')->get(); 
        // pending = 2 ; approved = 1; rejected = 0

        // dd($job_application[0]->email);
        if(!$job_application || count($job_application) == 0){
            toastr()->error('Sorry the approved has already been rejected or doesnt exist');
            return back();
        }

        $reject_job_application = $job_application[0]->update([
            'status' => '0'
        ]);

        if(!$reject_job_application){
            toastr()->error('Sorry the Job Application could not be rejedted, try again later');
            return back();
        }

        toastr()->success('Job Application has been rejected Successfully');
        // send an email to the user that the job application has been rejected 

        $email = $job_application[0]->email;
        $data = [
            'email' => $job_application[0]->email,
            'name' => $job_application[0]->name,
            'post' =>$job_application[0]->position,
            'date' => $job_application[0]->created_at
        ];

        Mail::to($email)->send(new JobApplicationRejected($data));

        toastr()->success('An E-mail has been sent to the applicant via-' . $email);

        return back();
    }
}
