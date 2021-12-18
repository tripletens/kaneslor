<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Interview;
use App\Mail\SetInterviewMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\DB;

class InterviewController extends Controller
{
    public function fetch_all_interviews(){
        $all_interviews = DB::table('interviews')->join('applications', 'interviews.application_code', '=', 'applications.code')->
        select('interviews.*','interviews.id as interview_id','interviews.status as status','applications.name as name')->orderBy('interviews.id','DESC')->paginate(6);
        // dd($all_interviews);
        $data = [ 
            'interviews' => $all_interviews
        ];
        return view('admin.interviews.view')->with($data);
    }
    //
    public function save_interview(Request $request){
        // `title`, `application_code`, `type`, `link`, `address`, `time`, `date`, `status`,
        $validator = Validator::make($request->all(), [
            "title" => 'required|max:255',
            "type" => 'required',
            "time" => 'required',
            "date" => 'required',
        ]);
    
        if ($validator->fails()) {
            toastr()->error('All Fields are Required');
            return back()->withErrors($validator)->withInput();
        }

        $title = $request->input('title');
        $name = $request->input('name');
        $application_code = $request->input('application_code');
        $type = $request->input('type');
        $meeting_link = $request->input('meeting_link');
        $interview_address = $request->input('interview_address');
        $time = $request->input('time');
        $date = $request->input('date');

        $save_details = Interview::create([
            "title" => $title ? $title : null,
            "application_code" => $application_code ? $application_code : null,
            "type" => $type ? $type : null,
            "link" => $meeting_link ? $meeting_link : null,
            "address" => $interview_address ? $interview_address : null,
            "time" => $time ? $time : null,
            "date" => $date ? $date : null,
        ]);

        if(!$save_details){
            toastr()->error('Sorry! we could not set up the interview');
            return back();
        }
        $data = [
            "name" => $name ? $name : null,
            "title" => $title ? $title : null,
            "application_code" => $application_code ? $application_code : null,
            "type" => $type ? $type : null,
            "link" => $meeting_link ? $meeting_link : null,
            "address" => $interview_address ? $interview_address : null,
            "time" => $time ? $time : null,
            "date" => $date ? $date : null,
        ];
        
        $email = $request->input('email');

        Mail::to($email)->send(new SetInterviewMail($data));

        toastr()->success('Interview created successfully');
        return back();
    }
    public function delete_interview($id){
        $interview = Interview::find($id);
        
        if(!$interview){
            toastr()->error('Sorry! Interview doesnt exist');
            return back();
        }

        $status = $interview->status;

        // dd($status);

        if($status == '0'){
            toastr()->info('Sorry! Interview has already been deleted');
            return back();
        }

        // $delete_interview = $interview->save();
        $delete_interview = $interview->update(['status' => 0]);

        if(!$delete_interview){
            toastr()->info('Sorry! Interview could not be deleted. Try again later');
            return back();
        }

        toastr()->success('Interview has been deleted successfully.');
        return back();
    }
}
