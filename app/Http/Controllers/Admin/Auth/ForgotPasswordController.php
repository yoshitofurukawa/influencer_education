<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use Illuminate\Support\Facades\Password;        //追記

class ForgotPasswordController extends Controller
{
    public function showForgotPasswordForm()
    {
        return view('admin.auth.forgot_password');
    }
    use SendsPasswordResetEmails;

    protected function broker()                 //追記
    {                                           //追記
        return Password::broker('admins');      //追記
    }                                           //追記
}  