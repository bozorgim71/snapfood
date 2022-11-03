<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\UserAddress;
use Illuminate\Console\View\Components\Alert;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserAddressController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $id=Auth::user()->id;
//        $address = DB::table('user_addresses')
//            ->where('user_id', '=', $id)
//            ->get()
//        ->toArray();
$address=UserAddress::all()->where('user_id', '=', $id);
//            ->get();
        return view('userAddress.index',[
            'address'=> $address
        ]);    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('userAddress.create');
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
            'state' => ['required', 'alpha', 'max:55'],
            'city' => ['required', 'alpha', 'max:55'],
            'avenue' => ['required', 'string', 'max:55'],
            'street' => ['required', 'string', 'max:55'],
            'latitude' => ['required'],
            'longitude' => ['required'],
            'description' => ['required', 'string', 'max:255'],
            'pelack' => ['required', 'integer'],
        ]);
$id=Auth::user()->id;

        $user = UserAddress::create([
            'state' => $request->state,
            'city' => $request->city,
            'avenue' => $request->avenue,
            'street'=>$request->street,
            'latitude' => $request->latitude,
            'longitude' => $request->longitude,
            'description' => $request->description,
            'plack' => $request->pelack,
            'user_id'=> $id
        ]);
        //	 	latitude	longitude	state	city	avenue	street	plack	description	user_id

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
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('userAddress.edit',[
            'address'=>UserAddress::find($id)
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
        $book = UserAddress::find($id);
        $book->update(\request()->except(['_token', '_method']));
        return redirect("/userAddress");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        UserAddress::destroy($id);

        return redirect('/userAddress');
    }
}
