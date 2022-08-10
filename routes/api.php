<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });
Route::post('changeState','MealController@changeState');
Route::get('sms',function(){
	$otp='0909';
	$receiver='963933506232';
     $url="https://zadaksy.sy/?phone=".$receiver."&msg=".$otp;
   // dd($url);
    $res= json_decode(file_get_contents($url),true);
 dd($res);});
