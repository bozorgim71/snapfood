<?php

namespace App\Http\Controllers;

use App\Models\Address;
use Illuminate\Http\Request;

class AddressController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $id=  auth('sanctum')->user()->id;

        return Address::where('user_id','=',$id)->get();

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //'title'	,'address',	'latitude'	,'longitude'	,'is_active',	'user_id'
       $input= $request->validate([
            'title' => ['required', 'string', 'max:55'],
            'address' => ['required', 'string', 'max:255'],
            'latitude' => ['required'],
            'longitude' => ['required']

        ]);

        $id=  auth('sanctum')->user()->id;

        $user = Address::create([
            'title' => $input['title'],
            'address' => $input['address'],
            'latitude' => $input['latitude'],
            'longitude' => $input['longitude'],
            'user_id'=> $id
        ]);

        return $user;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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

        $customer=Address::find($id);
        $customer->update($request->all());
        return $customer;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
