<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Dish;
use App\Models\Order;
use Illuminate\Http\Request;

class DishController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dishes = Dish::orderBy('id', 'desc')->get();
        return view('kitchen.dish',compact('dishes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('kitchen.dish_create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $file = $request->file('image');
        $filename = uniqid().'_'.$file->getClientOriginalName();
        $file->move(public_path().'/uploads/',$filename);
        Dish::create([
            'name'=>$request->name,
            'category_id'=>$request->category,
            'image'=>$filename
        ]);
        return redirect(route('index'))->with('status','Successfull Data Insert From Dishes Table');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $dishes = Dish::findOrFail($id);
        $categories = Category::all();
        return view('kitchen.dish_edit',compact('dishes','categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if($request->image){
            $imageName = date('YmdHs') ."_." .request()->image->getClientOriginalExtension();
            request()->image->move(public_path('uploads'),$imageName);
        }

        Dish::create([
            'name'=>$request->name,
            'category_id'=>$request->category,
            'image'=>$imageName
        ]);
        return redirect(route('index'))->with('status','Successfull Data Update From Dishes Table');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $dishes=Dish::findOrFail($id);
        $dishes->delete();
        return redirect('dish')->with('status','Successfull Delete Data From Dishes Table');
    }


    public function order()
    {
        $rawstatus = config('res.order_status');
        $status = array_flip($rawstatus);
        $orders = Order::whereIn('status',[1,2,3])->get();
        return view('kitchen.order',compact('orders','status'));
    }

    public function approve(Order $order)
    {
        $order->status = config('res.order_status.processing');
        $order->save();

        return redirect('/order')->with('status','Order Approve Successfull');
    }
    public function cancel(Order $order)
    {
        dd($order);

        $order->status = config('res.order_status.cancel');
        $order->save();
        return redirect('/order')->with('status','Order Cancel Successfull');

    }
    public function ready(Order $order)
    {
        $order->status = config('res.order_status.ready');
        $order->save();
        return redirect('/order')->with('status','Order Ready Successfull');
    }
}
