<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable=['name_ar','name_en','sort','state','image'];

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
    public function meals(){
        return $this->hasMany(Meal::class,'category_id');
    }

}
