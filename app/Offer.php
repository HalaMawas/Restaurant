<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Offer extends Model
{
    protected $fillable=['name_ar','name_en','description_ar','description_en','image','start','end'];
}
