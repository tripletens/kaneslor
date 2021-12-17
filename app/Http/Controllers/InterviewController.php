<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Interview;

class InterviewController extends Controller
{
    //
    public function fetch_all_interviews(){
        $all_interviews = Interview::all();
        $data = [ 
            'interviews' => $all_interviews
        ];
        return view('dashboard.interviews.view')->with($data);
    }
    // public function 
}
