<?php

namespace App\Http\Controllers;

use App\Checklist;
use App\ItemsChecklist;
use Illuminate\Http\Request;

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
            'items' => [],
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

        $indexArr = 0; //индекс массива для вставки в бд
        $notes = $request['note'];
        if (!empty($notes)){
            foreach ($notes as $note){
                if (!empty($note)) {

                    ItemsChecklist::create([
                        'note' => $note,
                        'number_item' => $indexArr,
                        'checklist_id' => Checklist::query()->max('id'),
                        'completed' => false,
                    ]);
                    $indexArr++;
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
     * @return \Illuminate\Http\Response
     */
    public function edit(Checklist $checklist)
    {
        //
        $items = ItemsChecklist::with('checklist')
            ->where('checklist_id', '=', $checklist->id)
            ->get();
//        dd($items);
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
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Checklist $checklist)
    {
//        dd($request);


        $checklist->name = $request->name;
        if ($request->completed == 'on')
            $checklist->completed = 1;
        else $checklist->completed = 0;

        $items = ItemsChecklist::with('checklist')
            ->where('checklist_id', '=', $checklist->id)
            ->get();

        //изменения пункта чеклиста
        for ($i = 0; $i < $items->count(); $i++) {
            if (empty($request->itemChecklist[$i])){
//                dd($request->itemChecklist);
                ItemsChecklist::where('number_item', $i)->delete();
            } else {
            ItemsChecklist::where('id', '=', $items[$i]->id)
                ->update([
                    'note' => $request->itemChecklist[$i]
                ]);
//            var_dump($items[$i]->id);
//            var_dump($request->itemChecklist[$i]);
            }
        }

        //добавление нового пункта чеклиста
        $indexArr = $request->itemChecklist;
        end($indexArr);             //получение последнего индекса элемента
        $indexArr = key($indexArr);       //для вставки в бд
        $indexArr++;

        $notes = $request->note;
        if (!empty($notes)) {
            foreach ($notes as $note) {
                if (!empty($note)) {
                    ItemsChecklist::create([
                        'note' => $note,
                        'number_item' => $indexArr,
                        'checklist_id' => $checklist->id,
                        'completed' => false,
                    ]);
                }
            }
        } else {
            /*$itemChecklist = ItemsChecklist::find()
            ItemsChecklist::delete();*/
        }


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
//        dd($checklist);
        $checklist->delete();
        ItemsChecklist::where('checklist_id', $checklist->id)->delete();
//        dd($itemsChecklist);


        return redirect()->route('checklist.index');
    }
}
