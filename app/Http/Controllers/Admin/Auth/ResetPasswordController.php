<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Support\Facades\Password;            //追記
use Illuminate\Http\Request;                        //追記

class ResetPasswordController extends Controller
{
    use ResetsPasswords;

    protected $redirectTo = 'Admin/home';           //修正

    protected function broker()                     //追記
    {                                               //追記
        return Password::broker('admins');          //追記
    }                                               //追記
}