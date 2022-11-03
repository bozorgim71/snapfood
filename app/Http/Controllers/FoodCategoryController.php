<?php

namespace App\Http\Controllers;

use App\Models\FoodCategory;
use Illuminate\Http\Request;

class FoodCategoryController extends Controller
{
    /**
 * Display a listing of the resource.
 *
 * @return \Illuminate\Http\Response
 */
    public function index()
    {
        return view('foodCategory.index',[
            'categories'=>FoodCategory::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('foodCategory.create');
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

        $user = FoodCategory::create([
            'name' => $request->name,
            'description' => $request->description
        ]);
        return redirect('foodCategory');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('foodCategory.show', [
            "category" => FoodCategory::find($id)
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
        return view('foodCategory.edit', [
            "category" => FoodCategory::find($id)
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
        $book = FoodCategory::find($id);
        $book->update(\request()->except(['_token', '_method']));
        return redirect("/foodCategory");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        FoodCategory::destroy($id);
        return redirect('/foodCategory');
    }
}
