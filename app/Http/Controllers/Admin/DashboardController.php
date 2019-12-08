<?php

namespace App\Http\Controllers\Admin;

use App\Checklist;
use App\Http\Controllers\Controller;
use App\ItemsChecklist;
use App\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    //DashBoard
    public function dashboard(){
        $this->middleware('auth');
        $this->middleware('role');
        return view('admin.dashboard', [
            'users' => User::all()->count(),
            'checklists' => Checklist::all()->count(),
            'items' => ItemsChecklist::all()->count(),
        ]);
    }
}
