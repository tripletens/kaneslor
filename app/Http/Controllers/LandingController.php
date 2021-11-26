<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LandingController extends Controller
{
    // landing page
    public function index()
    {
        //
        return view('index');
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
