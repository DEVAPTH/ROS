<?php

namespace App\Http\Controllers;

use App\Models\Dish;
use App\Models\Order;
use App\Models\Table;
use Illuminate\Http\Request;

class OrderController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
       $dishes = Dish::orderBy('id','desc')->get();
       $tables = Table::all();
        return view('order_form',compact('dishes','tables'));
    }

    public function submit(Request $request)
    {
        $data =array_filter($request->except('_token'));
        $orderId =rand();
        foreach ($data as $key => $value) {
            if($value >1){
                for ($i=0; $i < $value; $i++) {
                    $this->saveOrder($key,$orderId,$request);
                }
            }else{
                $this->saveOrder($key,$orderId,$request);
            }
        }
        return redirect('/')->with('status','Order Submitted Successfully');
    }

    public function saveOrder($orderId,$dish_id,$request){

        $order = new Order();
        $order->order_id = $orderId;
        $order->dish_id = $dish_id;
        $order->table_id = $request->table;
        $order->status = config('res.order_status.new');
        $order->save();
    }
    // public function submit(Request $request)
    // {
    //     $data = array_filter($request->except('_token')) ;
    //     $orderId = rand();
    //     $request->table=1;

    //     foreach ($data as $key => $value) {
    //         if($value >1){
    //             for($i =0; $i<$value;$i++){
    //                 $order = new Order();
    //                 $order->order_id = $orderId;
    //                 $order->dish_id = $key;
    //                 $order->table_id = $request->table;
    //                 $order->status = config('res.order_status');
    //                 $order->save();

    //             }
    //         }else{
    //              $order = new Order();
    //                 $order->order_id = $orderId;
    //                 $order->dish_id = $key;
    //                 $order->table_id = $request->table;
    //                 $order->status = config('res.order_status');
    //                 $order->save();
    //         }
    //     }
    //     exit();

    }
