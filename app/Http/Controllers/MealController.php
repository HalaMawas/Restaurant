<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Meal;
use App\Category;
use App\ExtraMeal;
class MealController extends Controller
{
    public function create(){
        
        return view('admin.meal.create');
    }
     public function index(){
        $menus=cache('categoriesvar');
        $meals=Meal::orderby('category_id')->orderby('sort')->get();
        return view('admin.meal.index',compact('meals','menus'));
    }
    public function store(Request $request)
    {
         try {
             $meal = Meal::wherecategory_id($request->category)
                ->where(function ($query) use ($request) {
                    $query->where('name_ar', $request->name_ar);
                })->first();
            // if (!isset($meal)) {
                $meal = new Meal();
                $meal->category_id = $request->category;
                $meal->name_en = $request->name_en;
                $meal->name_ar = $request->name_ar;
                $meal->description_en = $request->description_en;
                $meal->description_ar = $request->description_ar;
                $meal->price = $request->price;
                $meal->weight = $request->weight;
                 if($request->sort)
                $meal->sort = $request->sort;
                if (!empty ($request->file('image'))) {
                    $imageName = uniqid() . $request->file('image')->getClientOriginalName();

                    $request->file('image')->move(public_path('imageMeals'), $imageName);
                    $meal->image = $imageName;
                }
                $datas = $request->name;
                $models = $request->input('price_extra');
                if ($meal->save()) {
                    if(isset($request->ext_name_ar)){
                    $extras=$request->ext_name_ar;
                    foreach($extras as $key=>$extra){
                        $extrameal=new ExtraMeal();
                        $extrameal->meal_id=$meal->id;
                        $extrameal->name_ar=$extra;
                        $extrameal->name_en=$request->ext_name_en[$key];
                        $extrameal->price=$request->ext_price[$key];
                        $extrameal->save();
                    }
                }
                    return redirect()->back()->with("success", "تمت الاضافة بنجاح");

                } else {
                    return redirect()->back()->with("error", '<i class="fa fa-times "></i>حدث خطأ اثناء الحفظ');
                }

            
        } catch (\Exception $e) {

            return redirect()->back()->with("error", '<i class="fa fa-times "></i>' . $e->getMessage());

        }
        
    }
    public function changeState(Request $request)
    {
        $model='App\\'.$request->type;
        $change=$model::find($request->id);
       if(isset($change)){
            if($change->state){
                $change->update(['state'=>0]);
            }else{
                                $change->update(['state'=>1]);

            }
       }
        $response = array(
                'success' => true,
                'msg' =>'تم التعديل بنجاح',
            );
              return response()->json($response);

    }
}
