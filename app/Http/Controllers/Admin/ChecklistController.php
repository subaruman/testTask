<?php

namespace App\Http\Controllers\Admin;

use App\Checklist;
use App\ItemsChecklist;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Routing\Controller;

class ChecklistController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('admin.checklist.index', [
            'checklists' => Checklist::with('user')->orderBy('user_id')->get(),
            'items' => ItemsChecklist::all(),
            'users' => User::all(),
        ]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('admin.checklist.create', [
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


        $notes = $request['note'];
        if (!empty($notes)){
            foreach ($notes as $note){
                if (!empty($note)) {
                    ItemsChecklist::create([
                        'note' => $note,
                        'checklist_id' => Checklist::query()->max('id'),
                        'completed' => false,
                    ]);
                }
            }
        }
        return redirect()->route('admin.checklist.index');
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

        return view('admin.checklist.edit', [
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
            ->get();

        for ($i = 0; $i < $items->count(); $i++) {
            ItemsChecklist::with('checklist')
                ->where('id', '=', $items[$i]->id)
                ->update([
                    'note' => $request->itemChecklist[$i]
                ]);
        }

         //если добавили новые пункты
        $notes = $request->note;
        if (!empty($notes)) {
            foreach ($notes as $note) {
                if (!empty($note)) {
                    ItemsChecklist::create([
                        'note' => $note,
                        'checklist_id' => $checklist->id,
                        'completed' => false,
                    ]);
                }
            }
        }
        $checklist->save();
        return redirect()->route('admin.checklist.index');
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
        return redirect()->route('admin.checklist.index');
    }
}
