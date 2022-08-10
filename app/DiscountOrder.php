<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DiscountOrder extends Model
{
    protected $fillable=['user_id','order_id','discount','discount_type'];
}
