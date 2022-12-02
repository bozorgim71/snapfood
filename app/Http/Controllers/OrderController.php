<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Restaurant;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function ordersShow()
    {
        $order=Order::all();

        $id=Auth::user()->id;
       // $user=User::find($id);


        $test=[];
        foreach (Restaurant::all() as $a)
        {
            if($a['user_id']==$id) {$test[]=$a['id'];}
        }
        $income=0;
        $order=[];
        foreach (Order::all() as $a)
        {
            if(in_array($a['restaurant_id'] , $test)) {$order[]=$a;}
            $income +=$a['cost'];
        }

        return view('orders.orders',[
            'orders'=>$order,
            'income'=>$income
        ]);
    }

    public function ordersEdit(Request $request)
    {
//        return $request->status;
//        return $request->order_id;

        $book = Order::find( $request->order_id);
        $book->update(\request()->except(['_token', '_method']));
        return redirect("/orders");
    }
}
