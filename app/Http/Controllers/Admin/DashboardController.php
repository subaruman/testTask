<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    //DashBoard
    public function dashboard(){
//        $this->middleware('auth');
        printf('Dashboard');
        return view('admin.dashboard');
    }
}
