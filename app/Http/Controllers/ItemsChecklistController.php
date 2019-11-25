<?php

namespace App\Http\Controllers;

use App\Checklist;
use App\ItemsChecklist;
use Illuminate\Http\Request;

class ItemsChecklistController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ItemsChecklist  $itemsChecklist
     * @return \Illuminate\Http\Response
     */
    public function show(ItemsChecklist $itemsChecklist)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ItemsChecklist  $itemsChecklist
     * @return \Illuminate\Http\Response
     */
    public function edit(ItemsChecklist $itemsChecklist)
    {
        //
        return view('checklist.items_checklist.show_items', [
            'items' => $itemsChecklist,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ItemsChecklist  $itemsChecklist
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ItemsChecklist $itemsChecklist)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ItemsChecklist  $itemsChecklist
     * @return \Illuminate\Http\Response
     */
    public function destroy(ItemsChecklist $itemsChecklist)
    {
        //
    }
}
