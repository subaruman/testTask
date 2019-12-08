<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Checklist extends Model
{
    protected $fillable = [
        'name',
        'completed',
        'user_id'
    ];

    public function items(){
        return $this->hasMany('App\ItemsChecklist', 'checklist_id');
    }

    public function user(){
        return $this->hasOne('App\User', 'id');
    }
}
