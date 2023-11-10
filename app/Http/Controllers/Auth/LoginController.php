<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    protected $redirectTo = RouteServiceProvider::HOME;

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function authenticated(Request $request, $user)
    {
        if ($user->role_id === 2) {
            return redirect()->route('select-service');
        } elseif ($user->role_id === 1) {
            return redirect()->route('admin.dashboard');
        } elseif ($user->role_id === 3) {
            return redirect()->route('kapster.dashboard');
        } else {
            return redirect('/');
        }
    }
}
