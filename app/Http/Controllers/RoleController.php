<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RoleController extends Controller
{
    //
    public function index(){
        echo "<br>Role Controller.";
        return view('home');
    }
}
