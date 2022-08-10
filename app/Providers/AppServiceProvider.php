<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\View;
use App\Language;
use App\Category;
use App\Table;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
                Schema::defaultStringLength(191);
                Cache::rememberForever('languagesvar', function () {
            return Language::all();
        });  
                Cache::rememberForever('categoriesvar', function () {
            return Category::with('meals')->get();
        });
              Cache::rememberForever('tables', function () {
            return Table::all();
        });

    }
}
