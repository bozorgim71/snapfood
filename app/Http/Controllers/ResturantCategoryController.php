<?php

namespace App\Http\Controllers;

use App\Models\RestaurantCategory;
use App\Models\UserAddress;
use Illuminate\Http\Request;

class ResturantCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('restaurantCategory.index',[
            'categories'=>RestaurantCategory::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('restaurantCategory.create');
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
            'description' => ['required', 'string', 'max:255']
        ]);

        $user = RestaurantCategory::create([
            'name' => $request->name,
            'description' => $request->description
        ]);
        return redirect('restaurantCategory');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('restaurantCategory.show', [
            "category" => RestaurantCategory::find($id)
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
        return view('restaurantCategory.edit', [
            "category" => RestaurantCategory::find($id)
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
        $book = RestaurantCategory::find($id);
        $book->update(\request()->except(['_token', '_method']));
        return redirect("/restaurantCategory");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        RestaurantCategory::destroy($id);
        return redirect('/restaurantCategory');
    }
}
