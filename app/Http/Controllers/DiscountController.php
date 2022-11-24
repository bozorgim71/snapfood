<?php

namespace App\Http\Controllers;

use App\Models\Discount;
use App\Models\Food;
use App\Models\Restaurant;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DiscountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

$id=Auth::user()['id'];
   $user=User::find($id);

 //  return $user->restaurant()->where('id', 1)->get();;
       // return $user->food()->get();;


        return view('discount.index',[
            'foods'=> $user->food()->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $id=Auth::user()['id'];
      // return  Discount::userDiscount($id);

        return view('discount.show',[
            'discount'=>Discount::userDiscount($id)
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
        return view('discount.edit',[
            'food'=>Food::find($id)
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
        //id	name	description	present	food_id	created_at	updated_at
//       return  $request->food_id;
        $request->validate([
            'name' => ['required', 'string', 'max:100'],
            'description' => ['required', 'string', 'max:255'],
            'present'=> ['required'],
        ]);

        $user = Discount::create([
            'name' => $request->name,
            'description' => $request->description,
            'present'=>$request->present,
            'food_id'=>$request->food_id,
        ]);
        return redirect('discount');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Discount::destroy($id);
        return redirect('discount');
    }
}
