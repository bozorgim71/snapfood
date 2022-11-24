<?php

namespace App\Http\Controllers;

use App\Models\Food;
use App\Models\Restaurant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RestaurantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $id=Auth::user()->id;

       $test=[];
       foreach (Restaurant::all() as $a)
       {
           if($a['user_id']==$id) {$test[]=$a;}
       }

        return view('restaurant.index',
        [
            'restaurants'=>$test
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('restaurant.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate([
            'name' => ['required', 'string', 'max:55'],
            'description' => ['required', 'string', 'max:55'],
            'address' => ['required', 'string', 'max:55'],
            'phone' => ['required', 'string', 'max:15'],
            'latitude' => ['required'],
            'longitude' => ['required'],
            'account' => ['required', 'string', 'max:16'],
            'rest_id' => ['required', 'integer'],
        ]);


        $id=Auth::user()->id;
// 	name	description	phone	account	address	latitude	longitude	image_path	cat_id	user_id
        $user = Restaurant::create([
            'name' => $request->name,
            'description' => $request->description,
            'address' => $request->address,
            'phone'=>$request->phone,
            'latitude' => $request->latitude,
            'longitude' => $request->longitude,
            'account' => $request->account,
            'user_id'=> $id,
            'cat_id'=>$request->rest_id
        ]);

        return  redirect('/dashboard');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $food=[];
        foreach (Food::all() as $a)
        {
            if($a['restaurant_id']==$id) {$food[]=$a;}
        }

        return view('restaurant.show',
            [
                'restaurant'=>Restaurant::find($id),
                'foods'=>$food

            ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('restaurant.edit',
        [
            'restaurant'=>Restaurant::find($id)
        ]);
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
        $book = Restaurant::find($id);
        $book->update(\request()->except(['_token', '_method']));
        return redirect("/restaurant");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Restaurant::destroy($id);

        return redirect('/restaurant');
    }
}
