<?php

namespace App\Http\Controllers;

use App\Models\Table;
use App\Models\Dishes;
use App\Models\Orders;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index(){
        $status = array_flip(config('request.status'));
        $orders = Orders::whereIn('status',[1,2])->get();
        return view('kitchen.order',compact('orders','status'));
    }

    public function main(){
        $status = array_flip(config('request.status'));
        $orders = Orders::whereIn('status',[4])->get();
        $dishes = Dishes::OrderBy('id','desc')->get();
        $tables = Table::all();
        return view('order_dish', compact('dishes','tables','orders','status'));
    }

    public function submit(Request $request){
        $datas = array_filter($request->except('_token','table_id'));
        $order_id = rand();
        $table_id = $request->table_id;
        foreach($datas as $key => $value){
            if($value > 1){
                for ($i=0; $i < $value; $i++) { 
                  $this->save($key,$order_id,$table_id);
                }
            }else{
               $this->save($key,$order_id,$table_id);
            }
        }   
        return redirect('/')->with('status',config("alert.message.order_success")); 
    }

    public function save($key,$order_id,$table_id){
        $order = new Orders();
        $order->order_id = $order_id;
        $order->dish_id = $key;
        $order->table_id = $table_id;
        $order->status = config("request.status.new");
        $order->save();
    }

    public function approve(Orders $order){
        $order->status = config('request.status.process');
        $order->save();
        return redirect('/order')->with('status',config('alert.order_message.submitted'));
    }

    public function cancel(Orders $order){
        $order->status = config('request.status.cancel');
        $order->save();
        return redirect('/order')->with('status',config('alert.order_message.cancel'));
    }

    public function ready(Orders $order){
        $order->status = config('request.status.ready');
        $order->save();
        return redirect('/order')->with('status',config('alert.order_message.ready'));
    }

    public function serve(Orders $order){
        $order->status = config('request.status.done');
        $order->save();
        return redirect('/')->with('status',config('alert.order_message.done'));
    }
}
