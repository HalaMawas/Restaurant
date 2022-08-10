<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Basket;
use App\Table;
use App\Meal;
class BasketController extends Controller
{
    public function addBasket(Request $request){
            // dd($request->input());
        $meal=Meal::find($request->meal);
            $basket=new Basket();
            $basket->table_id=$request->table;
            $basket->meal_id=$request->meal;
            $basket->extraoption=json_encode($request->extraoption);
            $basket->save();
            return redirect('meal/'.$meal->category_id)->back()->with("success", "تمت الاضافة بنجاح");

    }
    public function showbasket(Table $table)
    {
       return view('basket',compact('table'));
    }
}
