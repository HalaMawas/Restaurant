<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Meal extends Model
{
        protected $fillable=['name_ar','name_en','description_ar','description_en','weight','price','sort','category_id','image','state'];
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
    public function extraMeals(){
        return $this->hasMany(ExtraMeal::class,'meal_id');
    }
     public function category(){
        return $this->belongsTo(Category::class,'category_id')->withDefault();
    }

}
