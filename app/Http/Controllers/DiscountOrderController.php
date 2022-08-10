<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DiscountOrder;
class DiscountOrderController extends Controller
{
    public function store(Request $request){
        
         $request->validate([
            'user_id'=>'required',
            'order_id'=>'required',
            'discount'=>'required',
            'discount_type'=>'required',
        ]);

      $discount=  DiscountOrder::create($request->all());
      return redirect()->back()->with("discountsuccess", "تمت الاضافة بنجاح");
    }
}
