<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;

class HomeController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');  // فقط المستخدمين المسجلين يمكنهم الوصول
    }



    public function index()
    {
        return view('layouts.home.home');
    }
}



// toastr()->success('messages.success');
// return redirect('/grade');
