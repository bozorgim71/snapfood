<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Restaurant;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{


    public function  reports()
    {
        $order = Order::all();

        $id = Auth::user()->id;
        // $user=User::find($id);


        $test = [];
        foreach (Restaurant::all() as $a) {
            if ($a['user_id'] == $id) {
                $test[] = $a['id'];
            }
        }
        $income = 0;
        $totalOrder = 0;
        $order = [];

        foreach (Order::all() as $item) {
            if (in_array($item['restaurant_id'], $test)) {
                $order[] = $item;
            }
            $income += $item['cost'];
            $totalOrder ++;
        }
        return view('orders.reports', [
            'orders' => $order,
            'income' => $income,
            'totalOrder'=> $totalOrder
        ]);
    }

    public function ordersShow()
    {
        $id = Auth::user()->id;

        $test = [];
        foreach (Restaurant::all() as $item) {
            if ($item['user_id'] == $id) {
                $test[] = $item['id'];
            }
        }

        $order = [];

        foreach (Order::all() as $a) {
            if (in_array($a['restaurant_id'], $test)) {
                $order[] = $a;
            }
        }

        return view('orders.orders', [
            'orders' => $order
        ]);
    }

    public function ordersEdit(Request $request)
    {

        $book = Order::find($request->order_id);
        $book->update(\request()->except(['_token', '_method']));
        return redirect("/orders");
    }
}
