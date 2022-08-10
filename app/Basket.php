<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Basket extends Model
{
    protected $fillable=['table_id','meal_id','extraoption'];
//     protected $casts = [
//     'extraoption' => 'array',
// ];
     public function meal(){
        return $this->belongsTo(Meal::class,'meal_id')->withDefault();
    }
     public function table(){
        return $this->belongsTo(Table::class,'table_id')->withDefault();
    }
     public function extraOptions(){
      
       if($this->extraoption=='null'){
         return [];
     }else{
      $extra_options=json_decode($this->extraoption, true);
        $options=ExtraMeal::whereIn('id',$extra_options)->get();
        return $options;
     }

    }
}
