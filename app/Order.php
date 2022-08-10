<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable=['table_id','state','total_bill','discount_type','discount_value','status'];


     public function meals()
    {
        return  $this->belongsToMany('App\Meal', 'meal_orders', 'order_id', 'meal_id')
            ->withPivot('qnt','meal_price','note')
            ->withTimestamps();
    }
     public function table(){
        return $this->belongsTo(Table::class,'table_id')->withDefault();
    }
    public function discounts(){
        return $this->hasMany(DiscountOrder::class,'order_id');
    }
 
}
