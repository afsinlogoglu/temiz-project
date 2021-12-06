<?php

namespace App\Http\Controllers;

use App\Courier;
use Illuminate\Http\Request;

class CourierController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $couriers = Courier::all();
        return response($couriers,200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'name' => 'required|min:6|max:30',
            'phone' => 'required|max:12',
            'capacity' =>'required|max:10',
            'plate' => 'required',
        ]);
        $courier = Courier::create($request->all());
        return response($courier,200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Courier  $courier
     * @return \Illuminate\Http\Response
     */
    public function show(Courier $courier)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Courier  $courier
     * @return \Illuminate\Http\Response
     */
    public function edit(Courier $courier)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Courier  $courier
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $id)
    {
        
        $courier = Courier::find($id);
        $input = $request->all();
        $courier ->update($input);

        return response($courier,200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Courier  $courier
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id)
    {
        $courier = Courier::find($id);
        $courier->delete();
        return response('Courier Deleted',200);
    }
    
    public function courier_orders($courier_id){
        $courier = Courier::find($courier_id);
        return $courier->orders;
    }
    public function delete_couriers_order($courier_id){
        $courier = Courier::find($courier_id);
        $courier->orders->delete();
        return response('Orders Deleted',200);
    }
}
