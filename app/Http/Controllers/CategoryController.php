<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
class CategoryController extends Controller
{
    public function create(){
        return view('admin.menu.create');
    } 
    public function index(){
        $menus=Category::orderby('sort')->get();
        return view('admin.menu.index',compact('menus'));
    }
    public function store(Request $request)
    {
         $request->validate([
            'name_ar'=>'required',
            'name_en'=>'required',
        ]);

      $category=  Category::create($request->all());
    
       if (!empty ($request->file('image'))) {
                    $imageName = uniqid() . $request->file('image')->getClientOriginalName();

                    $request->file('image')->move(public_path('category_image'), $imageName);
                    $category->update(['image' => $imageName]);
                }
                         return redirect()->back()->with("success", "تمت الاضافة بنجاح");

    }
   
}
