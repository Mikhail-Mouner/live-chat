<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminLoginController extends Controller
{
    use AuthenticatesUsers;

    protected $redirectTo = '/admin/dashboard';

    public function __construct()
    {
        $this->middleware('guest:admin,admin/dashboard')->except('logout');
    }


    public function showLoginForm()
    {
        return view('auth.admin.login');
    }

    protected function guard()
    {
        return Auth::guard('admin');
    }
}
