<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PaymentController extends Controller
{
    // fetch make payment page 
    public function fetch_my_payments(){
        return view('dashboard.payments.view-all-payments');
    }

    // fetch all the users payments 
    public function fetch_all_payments(){
        return view('dashboard.payments.view-payments');
    }
}
