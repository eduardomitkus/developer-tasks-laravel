<?php

namespace DeveloperTasks\Http\Controllers;

use Illuminate\Http\Request;
use DeveloperTasks\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class RedirectLoginController extends Controller
{
    public function login()
    {
        return redirect()->route('login');
    }

    public function logout()
    {
        if(Auth::check())
        Auth::logout();
        return Redirect::route('home');
    }
}