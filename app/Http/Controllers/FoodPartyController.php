<?php

namespace App\Http\Controllers;

use App\Models\FoodParty;
use App\Models\Food;
use Illuminate\Http\Request;

class FoodPartyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('party.index',[
            'party'=>FoodParty::all()
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

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

//        return view('party.show',[
//            'discount'=>FoodParty::all()
//        ]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //return $id;

        return view('party.edit',[
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
            'start' => ['required'],
            'end' => ['required'],
            'present'=> ['required'],
        ]);

        $user = FoodParty::create([
            'start' => $request->start,
            'end' => $request->end,
            'present'=>$request->present,
            'food_id'=>$request->food_id
        ]);
        return redirect('party');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        FoodParty::destroy($id);
        return redirect('party');
    }
}
