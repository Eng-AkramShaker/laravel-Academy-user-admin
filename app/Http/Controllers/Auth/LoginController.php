<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;




class LoginController extends Controller
{
    use AuthenticatesUsers;

    protected $redirectTo = '/home';    // وجه المستخدم  بعد تسجيل الدخول

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        $this->middleware('auth')->only('logout');
    }

    public function login(Request $request)
    {
        // التحقق من صحة المدخلات
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string|min:8',
        ]);

        // محاولة تسجيل الدخول
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            // إذا تم تسجيل الدخول بنجاح
            toastr()->success('تم تسجيل الدخول بنجاح');
            return redirect()->route('group.index');
        }

        // إذا فشل تسجيل الدخول
        toastr()->error('البريد الإلكتروني أو كلمة المرور غير صحيحة');
        return back();  // العودة إلى صفحة تسجيل الدخول
    }

    public function logout()
    {
        Auth::logout();  // تسجيل الخروج

        return redirect()->route('home')->with('success', 'تم تسجيل الخروج بنجاح');  // إعادة التوجيه إلى الصفحة الرئيسية
    }
}
