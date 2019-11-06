<?php

namespace App\Http\Controllers;

use App\Checklist;
use App\ItemsChecklist;
use Illuminate\Http\Request;
use phpDocumentor\Reflection\Types\Self_;

class ChecklistController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return view('checklist.index', [
            'checklists' => Checklist::all(),
            'items' => ItemsChecklist::all(),

        ]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('checklist.create', [
            'checklists' => [],
//            'items_checklist' => Checklist::with('items')->get(),
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
        //
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
        ]);
        Checklist::create([
            'name' => $request['name'],
            'completed' => false
        ]);

        $notes = $request['note'];
        if (!empty($note)){
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
//        implode( Input::get('completed',[])),
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
     * @return \Illuminate\Http\Response
     */
    public function edit(Checklist $checklist)
    {
        //

        return view('checklist.edit', [
            'checklist' => $checklist,
//            'items_checklist' => ItemsChecklist::query()->where($checklist->id == )
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Checklist  $checklist
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Checklist $checklist)
    {
        //
        $checklist->name = $request->name;
        if ($request->completed == 'on')
            $checklist->completed = 1;
        else $checklist->completed = 0;

        $checklist->save();
        return redirect()->route('checklist.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Checklist  $checklist
     * @return \Illuminate\Http\Response
     */
    public function destroy(Checklist $checklist)
    {
        $checklist->delete();
        return redirect()->route('checklist.index');
    }
}
