<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\QrCodeController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/




// Route::group(
//     [
//         'prefix' => LaravelLocalization::setLocale(),
//         'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]
//     ],
//     function()
//     {
         
        // Route::get('test', function () {
        //     $logo=\App\Setting::wherekey();
        //     return view('control.setting.logo');
        // });
    // });
Auth::routes();

Route::get('/view-clear', function() {
    $exitCode = Artisan::call('cache:clear');
    $exitCode = Artisan::call('view:clear');
    $exitCode = Artisan::call('config:cache');
    // $exitCode = Artisan::call('route:trans:cache');

    return '<h1>View cache cleared</h1>';
});
Route::group([
    
       'prefix' => LaravelLocalization::setLocale(),
        'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]
    ], function() {

        Route::get('/','HomeController@tables');
        Route::get('/category/{table}','HomeController@index');
        Route::get('/showbasket/{table}','BasketController@showbasket');
        Route::get('offers-show','HomeController@offer');
        Route::get('meals/{category}','HomeController@meal');
        Route::get('meal-detail/{meal}','HomeController@mealDetail');
        Route::post('sendorder','OrderController@store');
        Route::get('contact', function () {
            return view('contact');
        });

    
});

Route::get('changeLang/{lang}',function ($lang){
    App::setLocale($lang);
    Session::put('locale', $lang);
    \LaravelLocalization::setLocale($lang);
    $url = \LaravelLocalization::getLocalizedURL(App::getLocale(), \URL::previous());
    return Redirect::to($url);
});



 Route::group(['prefix'=>'control','middleware'=>'auth'], function () {
    Route::resource('menu','CategoryController');
    Route::resource('employee','EmployeeController');
    Route::resource('meal','MealController');
    Route::resource('offer','OfferController');
    Route::resource('basket','BasketController');
    Route::resource('order','OrderController');
    Route::resource('table','TableController');
    Route::resource('discount','DiscountController');
    Route::get('/generate-qrcode', [QrCodeController::class, 'index']);
    Route::get('/','HomeController@adminControl');
    Route::resource('user', 'UserController');
    Route::get('createuser', 'UserController@createUser')->name('createuser');
});
Route::post('add-basket','BasketController@addBasket');
Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
