<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Checklist extends Model
{
    protected $fillable = [
        'name',
        'completed'
    ];

    public function items(){
        return $this->hasMany('App\Checklist', 'id');
    }
}
