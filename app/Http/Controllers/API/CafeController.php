<?php

namespace App\Http\Controllers\API;

use App\Models\Cafe;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CafeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cafes = Cafe::all();
        return response()->json($cafes);
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
           'name'      => 'required|string',
           'address'   => 'required|string',
           'city'      => 'required|string',
           'state'     => 'required|string',
           'zip'       => 'required|numeric',
           'latitude'  => 'required|numeric',
           'longitude' => 'required|numeric',
        ]);
        $cafe = Cafe::create(request()->all());
        return response()->json($cafe, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cafe $cafe
     * @return \Illuminate\Http\Response
     */
    public function show(Cafe $cafe)
    {
        return response()->json($cafe);
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
        //
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
