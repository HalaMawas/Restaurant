<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Meal;
use App\Table;
use App\Order;
use App\Basket;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index($table)
    {

        return view('index',compact('table'));
    }

    public function meal(Category $category,Request $request)
    {
        $table=$request->table;
        return view('menu.index',compact('category','table'));
    }
    public function tables()
    {
        return view('table');
    }

    public function mealDetail(Meal $meal,Request $request)
    {   $table=$request->table;
        return view('meal',compact('meal','table'));
    }
    public function adminControl()
    {
        $refused=Basket::where('state','refused')->count();
        $waiting=Basket::where('state','wait')->count();
        $delivered=Basket::where('state','delivered')->count();
        $accepted=Basket::whereIN('state',['accepted','carAccepted'])->count();
        $dailyOrders=[];
        $orders=Order::get();
        $baskets=Basket::whereDate('created_at',date('Y-m-d'))->get();
        return view('admin.index',compact('refused','waiting','delivered','accepted','dailyOrders','orders','baskets'));
    }
}
