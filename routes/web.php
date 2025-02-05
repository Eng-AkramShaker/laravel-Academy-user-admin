<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Dashboard\Groups\GroupController;
use App\Http\Controllers\Home\HomeController;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;




Route::group(['prefix' => LaravelLocalization::setLocale()], function () {

    // =========================================== Users ==========================================================

    // عرض نموذج تسجيل الدخول
    Route::get('/home', function () {
        return  view('layouts.home.home'); // تأكد من أن ملف العرض موجود في المسار الصحيح
    })->name('login.form');

    // مسار تسجيل الدخول (POST)
    Route::post('home', [LoginController::class, 'login'])->name('login');

    Route::get('/', [HomeController::class, 'index'])->name('home');
    Route::post('register', [RegisterController::class, 'register'])->name('register');
    Route::post('logout', [LoginController::class, 'logout'])->name('logout');

    // =========================================== Admin ==========================================================

    Route::resource('group', GroupController::class);
});






Route::get('test', function () {
    return  route("group");
    // return  view('layouts.home.home');
});



// toastr()->success('messages.success');
// return redirect('/grade.index');