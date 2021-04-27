<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ModeratorLoginController extends Controller
{
    use AuthenticatesUsers;

    public function __construct()
    {
        $this->middleware('guest:moderator,moderator/dashboard')->except('logout');
    }

    public function showLoginForm()
    {
        return view('auth.moderator.login');
    }

    protected function guard()
    {
        return Auth::guard('moderator');
    }
}
