<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Food;
use App\Models\Restaurant;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;

class CustomerController extends Controller
{
    // regiser customer
    public function register(Request $request)
    {
        $customer = $request->validate(
            [
                'name' => 'required|string',
                'family' => 'required|string',
                'phone' => 'required|string|unique:users,phone',
                'email' => 'required|string|unique:users,email',
                'password' => 'required|string|confirmed'
            ]
        );

        $customer = User::create([
            'name' => $customer['name'],
            'family' => $customer['family'],
            'phone' => $customer['phone'],
            'email' => $customer['email'],
            'password' => bcrypt($customer['password']),
            'type' => 'customer'
        ]);
        $token = $customer->createToken('myapptoken')->plainTextToken;
        $response = [
            'customer' => $customer,
            'token' => $token
        ];
        return response($response, 201);
    }

    public function logout(Request $request)
    {


        auth()->user()->tokens()->delete();

        return [
            'message' => 'user logged out'
        ];
    }


    public function login(Request $request)
    {
        $customer = $request->validate(
            [
                'email' => 'required|string',
                'password' => 'required|string'
            ]
        );

        // check email
        $user = User::where('email', $customer['email'])->first();

        // check password

        if (!$user || !Hash::check($customer['password'], $user->password)) {
            return response([
                'message' => 'bad creds'
            ], 401);
        }

        $token = $user->createToken('myapptoken')->plainTextToken;
        $response = [
            'customer' => $user,
            'token' => $token
        ];
        return response($response, 201);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return User::find($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $id = auth('sanctum')->user()->id;
        $customer = User::find($id);
        $customer->update($request->all());
        return $customer;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return User::destroy($id);
    }

    public function search($name)
    {
        return Food::where('name', 'like', '%' . $name . '%')->get();
    }



    public function restaurants()
    {
        return Restaurant::all();
    }

    public function restaurant($id)
    {
        return Restaurant::find($id);
    }

    public function food($id)
    {
        return Food::where('restaurant_id', '=', $id)->get();
    }
}
