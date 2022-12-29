<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\ResetsPasswords;

class ResetPasswordController extends Controller
{
    use ResetsPasswords;


    protected function rules()
    {
        return [
            'token' => 'required',
            'email' => 'required',
            'password' => 'required',
        ];
    }

    protected $redirectTo = RouteServiceProvider::HOME;
}
