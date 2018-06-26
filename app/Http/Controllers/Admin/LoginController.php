<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    protected $redirectTo = '/admin/';

    public function __construct()
    {
        //$this->middleware('authadmin', ['except' => 'logout']);
    }

    //登录界面显示
    public function showLoginForm()
    {
    	return view("admin.login");
    }

    

    //使用admin guard
    protected function guard()
    {
    	return Auth::guard('admin');
    }


    //使用用户名进行验证
    public function username()
    {
        return 'name';
    }

    /**
     * 重写 Log the user out of the application.
     *
     * @param \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function logout(Request $request)
    {
        $this->guard()->logout();

        $request->session()->flush();

        $request->session()->regenerate();

        return redirect('/admin/login');
    }


    protected function authenticated(Request $request, $user)
    {
         // 存user到session
         $request->session()->put('user', $user);
    }
}
