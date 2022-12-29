<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
use Auth;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $data['customer_count'] = Customer::where('created_by',Auth::user()->id)->get()->count();
        return view('home',$data);
    }
}
