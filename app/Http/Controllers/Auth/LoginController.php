<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Auth;
use App\Models\User;
use Session;

class LoginController extends Controller
{
    
    use AuthenticatesUsers;

    protected $redirectTo = RouteServiceProvider::HOME;

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    protected function login(Request $request)
    {
        if(Auth::guard('web')->attempt(['email' => $request->email, 'password' => $request->password], $request->get('remember'))){
           return redirect()->route('home')->with('success', 'Login successfully.');
        }else{
            return back()->with('error', 'Invalid credentials');
        }
        return back()->withInput($request->only('email', 'password'));
    }

    protected function logout()
    {
        Session::flush();
        Auth::logout();
        return Redirect('login')->with('success', 'Logout successfully.');
    }
}
