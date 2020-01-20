<?php

namespace App\Http\Controllers;

use App\Checklist;
use App\ItemsChecklist;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ChecklistController extends Controller
{


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('checklist.index', [
            'checklists' => Checklist::where('user_id', '=', Auth::id())->get(),
            'items' => ItemsChecklist::all(),
        ]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('checklist.create', [
            'checklists' => [],
            'items' => [],
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        //

        $user = (User::all()->where('id', '=', Auth::id()));
        $user = current(current($user));
        $checklists_limit = $user['checklists_limit'];
        if (Checklist::all()
                ->where('user_id', '=', Auth::id())
                ->count() >= $checklists_limit)
            abort(403, 'Превышен лимит создания чеклистов.');

        $request->validate([
            'name' => ['required', 'string', 'max:255'],
        ]);
        if ($request->checklist_completed == 'on'){
            Checklist::create([
                'name' => $request->name,
                'completed' => 1,
                'user_id' => Auth::id(),
            ]);
        } else Checklist::create([
            'name' => $request->name,
            'completed' => 0,
            'user_id' => Auth::id(),
            ]);

        $items = $request['itemChecklist'];
        if (!empty($items)){
            foreach ($items as $item){
                if (!empty($item)) {
                    ItemsChecklist::create([
                        'note' => $item,
                        'checklist_id' => Checklist::query()->max('id'),
                        'completed' => false,
                    ]);
                }
            }
        }
        return redirect()->route('checklist.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Checklist  $checklist
     * @return \Illuminate\Http\Response
     */
    public function show(Checklist $checklist)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Checklist  $checklist
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(Checklist $checklist)
    {
        //
        $items = ItemsChecklist::with('checklist')
            ->where('checklist_id', '=', $checklist->id)
            ->get();

        return view('checklist.edit', [
            'checklist' => $checklist,
            'items' => $items
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Checklist  $checklist
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Checklist $checklist)
    {
        //
        $checklist->name = $request->name;
        if ($request->completed == 'on')
            $checklist->completed = 1;
        else $checklist->completed = 0;

        $items = ItemsChecklist::with('checklist')
            ->where('checklist_id', '=', $checklist->id)
            ->delete();
/*
        for ($i = 0; $i < $items->count(); $i++) {
            ItemsChecklist::with('checklist')
                ->where('id', '=', $items[$i]->id)
                ->update([
                    'note' => $request->itemChecklist[$i]
                ]);
        }*/

         //если добавили новые пункты
        $items = $request['itemChecklist'];
        if (!empty($items)) {
            foreach ($items as $item) {
                if (!empty($item)) {
                    ItemsChecklist::create([
                        'note' => $item,
                        'checklist_id' => $checklist->id,
                        'completed' => false,
                    ]);
                }
            }
        }

        $checklist->save();
        return redirect()->route('checklist.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Checklist  $checklist
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Checklist $checklist)
    {
        $checklist->delete();
        ItemsChecklist::where('checklist_id', '=', $checklist->id)->delete();
        return redirect()->route('checklist.index');
    }
}
