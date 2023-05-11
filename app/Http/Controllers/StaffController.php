<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StaffController extends Controller
{
    public function home()
    {
        if (!Auth::check()) {
            return redirect()->route('lget');}
        return view('staff.home');
    }
}
