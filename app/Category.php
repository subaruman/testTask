<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //get children category
    public function children(){
        return $this->hasMany(self::class, 'parent_id');
    }
}
