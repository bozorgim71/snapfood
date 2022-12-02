<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateOrderValidationRequest;
use App\Models\Cart;
use App\Models\Food;
use App\Models\Order;
use App\Models\Restaurant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function carts()
    {
        $carts = Cache::get('cart');

        $cart_id = [];

        foreach ($carts as $cart) {
            if (!in_array($cart['restaurant_id'], $cart_id)) {
                $cart_id[] = $cart['restaurant_id'];
            }
        }

        $cart = [];
        foreach ($cart_id as $id) {
            $cart[] = $this->cart($id);
        }

        // return $cart_id;

        return response([
            "cart" => $cart //Cache::get('cart')
        ], 201);


    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateOrderValidationRequest $request)
    {
      $input=  $request->validate();

//        $input = $request->validate([
//            'count' => ['required', 'integer', 'min:1'],
//            'food_id' => ['required', 'integer']
//        ]);

        $restaurant = Food::restaurant($input['food_id']);

        $cart = [];

        // Cache::forget('cart');
        //Cache::increment('count', 1);

        if (Cache::has('cart')) {

            $car = [
                'restaurant_id' => $restaurant,
                'food_id' => $input['food_id'],
                'count' => $input['count']
            ];

            $cart = Cache::get('cart');
            $cart[] = $car;
        } else {

            $cart = [];

            $car = [
                'restaurant_id' => $restaurant,
                'food_id' => $input['food_id'],
                'count' => $input['count']
            ];
            $cart[] = $car; //$cart[]=$car;
        }

        $id = auth('sanctum')->user()->id;

        Cache::forever('cart', $cart);

        return response([
            "msg" => "food added to cart successfully",
            "cart_id" => $restaurant
        ], 201);

    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function cart($id)
    {

        $name = Restaurant::find($id)['name'];

        $food = [];
        //return Cache::get('cart');
        foreach (Cache::get('cart') as $value) {

            if ($value['restaurant_id'] == $id) {

                $food[] = Food::find($value['food_id']);
            }
        }

        $cart = [
            'id' => $id,
            'restaurant' => $name,
            'food' => $food
        ];

        return response([
            "cart" => $cart
        ], 201);


    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {

        $input = $request->validate([
            'count' => ['required', 'integer', 'min:0'],
            'food_id' => ['required', 'integer']
        ]);

        $cart = Cache::get('cart');

        foreach ($cart as $key => $value) {

            if ($value['food_id'] == $input['food_id']) {
                $cart[$key]['count'] = $input['count'];
                break;
            }
        }

        foreach ($cart as $key => $value) {

            if ($value['count'] == 0) {
                unset($cart[$key]);

                Cache::forget('cart');

                Cache::forever('cart', $cart);
                return response([
                    "msg" => "food deleted successfully",
                    "cart" => Cache::get('cart', $cart)
                ], 201);
            }
        }

        Cache::forget('cart');
        Cache::forever('cart', $cart);

        return response([
            "msg" => "food updated in cart successfully",
            "cart" => Cache::get('cart', $cart)
        ], 201);

    }


    public function pay($id)
    {
        $user_id = auth('sanctum')->user()->id;
        $foods_id = [];
        $foods_count = [];
        $foods_name = [];
        $cost = 0;
        $code = time() % 10000;
        $cart = Cache::get('cart');

        foreach ($cart as $key => $car) {
            if ($car['restaurant_id'] == $id) {
                $foods_id[] = $car['food_id'];
                $foods_count[] = $car['count'];
                $foods_name[] = Food::find($car['food_id'])['name'];

                $cost += $car['count'] * Food::find($car['food_id'])['price'];

                unset($cart[$key]);
            }
        }

        Cache::forget('cart');
        Cache::forever('cart', $cart);

        $foods_id = implode(',', $foods_id);
        $foods_count = implode(',', $foods_count);
        $foods_name = implode(',', $foods_name);


        $order = Order::create([
            'code' => $code,
            'foods_id' => $foods_id,
            'foods_count' => $foods_count,
            'foods_name' => $foods_name,
            'user_id' => $user_id,
            'restaurant_id' => $id,
            'cost' => $cost
        ]);

        return response([
            'message' => ' payed successfully',
            'pay code' => $code
        ], 210);
    }
}
