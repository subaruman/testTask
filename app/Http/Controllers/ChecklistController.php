<?php


namespace App\Http\Controllers;


use Illuminate\Http\Request;

class ChecklistController
{
    public function index(){
        return view('checklist.index');
    }

    public function create()
    {
        return view('checklist.create', [
            'checklist' => []
        ]);
    }

    public function store(Request $request)
    {
        $validator = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:3', 'confirmed'],
        ]);

        User::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => bcrypt($request['password']),
        ]);
        return redirect()->route('admin.users.index');
    }
}
