<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ExtraMeal extends Model
{
        public $timestamps = false;
        protected $fillable=['name_ar','name_en','price','meal_id'];
        public static function boot() {

        parent::boot();

        static::saving(function () {
            \Cache::flush();

        } );
        static::updating(function () {
            \Cache::flush();

        } );
        static::deleting(function(){\Cache::flush();});
    }
}
