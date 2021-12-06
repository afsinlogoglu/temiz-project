<?php

namespace App\Http\Controllers;

use App\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $orders = Order::all();
        return response($orders,200);
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
            'customer_token' => 'required|min:10|max:10',
            'courier_id' => 'required',
            'senderName' => 'required|min:6|max:30',
            'senderPhone' => 'required|max:12',
            'receiverName' => 'required|min:6|max:30',
            'receiverPhone' => 'required|max:12',
            'senderAddress' => 'required',
            'receiverAddress' => 'required',
        ]);
        $order = Order::create($request->all());
        return response($order,200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $order = Order::find($id);
        $input = $request->all();
        $order->update($input);

        return response($order,200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
        $order = Order::find($id);
        $order->delete();

        return response('Order Deleted',200);
    }

    public function order_customer($token_string){
        $order = Order::find($token_string);
        return $order->customers;

    }

    public function orderDistance($id){
        $order = Order::find($id);
        return view ('orderDistance',compact('order'));
    }

}
