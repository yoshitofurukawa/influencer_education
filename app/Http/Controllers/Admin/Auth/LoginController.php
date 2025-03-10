<?php

namespace App\Http\Controllers\Admin\Auth;                   //修正

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;  
use Illuminate\Http\Request; 

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('admin.auth.login');
    }
    use AuthenticatesUsers {                                //追記
        logout as performLogout;                            //追記
    }                                                       //追記

    protected $redirectTo = '/admin/top';                  //修正


    public function __construct()
    {
        $this->middleware('guest:admin')->except('logout'); //修正
    }


    protected function guard()                              //追記
    {                                                       //追記
        return Auth::guard('admin');                        //追記
    }                                                       //追記


    public function logout(Request $request)
    {
        $this->guard('admin')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/admin/login');
    } 
}