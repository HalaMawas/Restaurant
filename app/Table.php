<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Table extends Model
{
   protected $fillable=['name','status'];

      public function baskets(){
        return $this->hasMany(Basket::class,'table_id')->whereDate('created_at',date('Y-m-d'));
    }
}
