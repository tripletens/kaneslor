<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Jobs;

class LandingController extends Controller
{
    // landing page
    public function index()
    {
        //
        $featured_jobs = Jobs::orderBy('id','desc')->limit(3)->get();
        $data = [
            'jobs' => $featured_jobs
        ];
        // dd($featured_jobs);
        return view('index')->with($data);
    }

    public function about()
    {
        //
        return view('about');
    }

    public function contact()
    {
        //
        return view('contact');
    }

    public function team()
    {
        //
        return view('team');
    }

    public function jobs()
    {
        //
        return view('jobs');
    }
    
    public function blog()
    {
        //
        return view('blog');
    }

    public function testimonials()
    {
        //
        return view('testimonials');
    }
    public function terms()
    {
        //
        return view('terms');
    }
}
