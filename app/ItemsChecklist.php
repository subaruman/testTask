<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ItemsChecklist extends Model
{
    //
    protected $table = 'items_checklist';

    protected $fillable = [
        'note',
        'checklist_id',
        'completed'
    ];

    public function checklist(){
        return $this->belongsTo('App\Checklist', 'id');
    }
}
