<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\agency;
use App\Models\branch;
use App\Models\Prefix;
use App\Models\Department;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function home()
    {
        if (!Auth::check()) {
            return redirect()->route('lget');}
        return view('user.home');
    } 
    
}
