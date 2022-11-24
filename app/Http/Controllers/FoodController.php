<?php

namespace App\Http\Controllers;

use App\Models\Food;
use App\Models\Restaurant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FoodController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $id=Auth::user()->id;

      $rest=Restaurant::where('user_id','=',$id)->get();
        $rest_id=0;
        foreach ($rest as $s)
        {
            if($s['user_id']==$id){
                $rest_id = $s['id'];
            }
        }


      // return Food::all()->where('restaurant_id','=',$rest_id)->count();

        return view('food.index',[
            'foods'=> Food::all()->where('restaurant_id','=',$rest_id)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('food.create');
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
            'name' => ['required', 'string', 'max:100'],
            'materials' => ['required', 'string', 'max:255'],
            'price' => ['required', 'max:55'],
            'cat_id' => ['required'],
            'rest_id' => ['required']
        ]);

       // $id=Auth::user()->id;

        $user = Food::create([
            'name' => $request->name,
            'materials' => $request->materials,
            'price'=>$request->price,
            'cat_id'=> $request->cat_id,
            'restaurant_id'=>$request->rest_id
        ]);

        return  redirect('/restaurant');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

return $id;
        $test=[];
        foreach (Food::all() as $a)
        {
            if($a['restaurant_id']==$id) {$test[]=$a;}
        }

        return view('food.show',
            [
                'foods'=>$test
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
        return view('food.edit',[
            'food'=> Food::find($id)
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
        $book = Food::find($id);
        $book->update(\request()->except(['_token', '_method']));
        return redirect("/food");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Food::destroy($id);

        return redirect('/food');
    }
}
