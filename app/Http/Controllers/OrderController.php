<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Basket;
use App\Table;
use App\Order;
use App\Meal;
use Mike42\Escpos\PrintConnectors\FilePrintConnector;
use Mike42\Escpos\Printer;
use Mike42\Escpos\EscposImage;
use Mike42\Escpos\PrintConnectors\WindowsPrintConnector;
use Mike42\Escpos\CapabilityProfile;
use Mike42\Escpos\PrintBuffers\ImagePrintBuffer;
// use ArUtil\I18N\Arabic;
class OrderController extends Controller
{
    public function saveOrder(Request $request)
    {
        $ordermeal=Basket::where('table_id',$request->table)->get();
        $order=new Order();
        $order->table_id=$request->table_id;
        // $order->=$request->;
    }
   
    public function index(Request $request)
    {
        $tables=Table::all();
        // $restaurants=Restaurant::all();

        if(count($request->input())==0){
            return view('admin.order.index',compact('tables'));

        }
        $orders=Order::with('table');
        // ->where('payment_state','succeeded');

        if ($request->from_date) {
            $orders = $orders->WhereDate('created_at', '>=', $request->from_date);
        }
        if ($request->to_date) {
            $orders = $orders->WhereDate('created_at', '<=', $request->to_date);
        }
        if ($request->table){
            $orders = $orders->Where('table_id', $request->customer);

        }
        // if($request->restaurant){

        //  $orders=$orders->wherehas('meals',function($query) use ($request){


        //      $query->wherehas('menu',function($query) use ($request){

        //             $query->where('restaurant_id',$request->restaurant);

        //         });
        //          });
        // }

        $orders=$orders->orderby('created_at','desc')->paginate(10);

        $url=$request->url().'?_token='.$request->input()['_token'].'&table='.$request->table.'&from_date='.$request->from_date.'&to_date='.$request->to_date;
        $orders->setPath($url);
        return view('admin.order.index',compact('tables','orders'));


    }
    public function store(Request $request)
    {
        $baskets=Basket::where('table_id',$request->table)->get();
        $order=new Order();
        $order->table_id=$request->table;
        $order->state=1;
        $order->status='wait';
        $order_array=[];
        $i=0;
        $total_bill=0;
        foreach ($baskets as $key => $basket) {
                    $meal=Meal::find($basket->meal_id);
                    $order_array[$i]['meal_id'] = $meal->id;
                    $order_array[$i]['qnt'] =$basket->qnt;
                    
                    $order_array[$i]['note']='';
                    $extraprice=0;
                     if(count($basket->extraOptions())>0){
                        foreach ($basket->extraOptions() as $key => $extraoption) {
                            $extraprice=$extraprice+$extraoption->price;
                           $order_array[$i]['note']=$order_array[$i]['note'].' , '.$extraoption->name_ar;
                        }
                      
                     }
                     $order_array[$i]['meal_price'] = $meal->price+$extraprice;
                     $total_bill=$total_bill+ ($order_array[$i]['meal_price']*$order_array[$i]['qnt']);
                        $i++;
         }
         $order->total_bill=$total_bill;
         if($request->discount){
            $order->discount_type=$request->discount_type;
            if($request->discount_type=='fixed'){
                $order->discount=$request->discount;

            }elseif($request->discount_type=='percent'){
                $order->discount= $total_bill*$request->discount*0.01;
            }

         }
         $order->save();

         $order->meals()->sync($order_array);
        return redirect()->back()->with("success", "تم الطلب بنجاح");


     }
     public function update(Order $order,Request $request)
     {
        
         
     }
     public function show(Order $order){
        return view('admin.order.edit',compact('order'));
     }
           public function print($orderID){
        $order=Order::find($orderID);
        $ticket=Ticket::first();
       
        $fontPath=public_path()."/aaa.ttf";
        $connector = new WindowsPrintConnector("POS80 Printer");
        //$printer = new Printer($connector);
        $textUtf8first = $ticket->first_row;
        //$maxChars = 50;
        $fontSizefisrt = $ticket->first_font_size;

        $textUtf8seconed = $ticket->second_row;
        $fontSizeseconed = $ticket->second_font_size;

        $textUtf8code = $order->Code;
        $fontSizecode = $ticket->code_font_size;
       
        $textUtf8third = $ticket->third_row;
        $fontSizethird = $ticket->third_font_size;

        $textUtf8date = date('Y-m-d H:i:s');
        $fontSizedate = $ticket->date_font_size;


        mb_internal_encoding("UTF-8");
        $Arabic = new Arabic('Glyphs');
        $textLtr = $Arabic -> utf8Glyphs($textUtf8first);
        $textLine = explode("\n", $textLtr);
        $buffer = new ImagePrintBuffer();
        $buffer -> setFont($fontPath);
        $buffer -> setFontSize($fontSizefisrt);
        $profile = CapabilityProfile::load("TEP-200M");

        $printer = new Printer($connector, $profile);
        $printer -> setPrintBuffer($buffer);

        $printer -> setJustification(Printer::JUSTIFY_CENTER);
        foreach($textLine as $text) {
            // Print each line separately. We need to do this since Imagick thinks
            // text is left-to-right
            $printer -> text($text . "\n");
        }

        $printer -> cut();
        $printer -> close();
return true;


    }
}
