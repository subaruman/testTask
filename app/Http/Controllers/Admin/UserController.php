<?php

namespace App\Http\Controllers\Admin;

use App\Checklist;
use App\Http\Controllers\Controller;
use App\ItemsChecklist;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.users.index', [
            'users' => User::paginate(10)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.users.create', [
            'user' => []
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
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

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('admin.users.edit', [
            'user' => $user,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $validator = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', Rule::unique('users')->ignore($user->id)],
            'password' => ['nullable', 'string', 'min:3', 'confirmed'],
            'checklists_limit' => ['nullable', 'integer', 'max:255']
        ]);

        $user->name = $request['name'];
        $user->email = $request['email'];
        if (!empty($request['checklists_limit']))
            $user->checklists_limit = $request['checklists_limit'];

        if ($request['password'] != null){
            $user->password = bcrypt($request['password']);
        }

        if ($request['ban'] == true){
            $user->banned = 1;
        }   else $user->banned = 0;

        $user->save();

        return redirect()->route('admin.users.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //удаление всех чеклистов и пунктов связанных с пользователем
        $checklist = Checklist::all()->where('user_id', '=', $user->id);
        foreach ($checklist as $elem) {
            ItemsChecklist::where('checklist_id', '=', $elem['id'])->delete();
            Checklist::where('user_id', '=', $user->id)->delete();
        }
        $user->delete();
        return redirect()->route('admin.users.index');
    }


/*   public function setban(User $user)
   {
       $user->banned = '1';
       $user->save();
       return redirect()->route('admin.users.index');
   }*/

}
