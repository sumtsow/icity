<?php

namespace App\Http\Controllers;

use App\Order;
//use App\Http\Requests\CreateOrder;
use App\Http\Requests\UpdateOrder;

class OrderController extends Controller
{
    /**
     * Display a listing of the orders.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('order.index', [
            'orders' => Order::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('order.create');
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
        return view('order.show', [
            'order' => Order::find($id),
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
        return view('order.edit', [
            'order' => Order::find($id),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateOrder $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateOrder $request, $id)
    {
        $order = Order::find($id);
		$order->state = $request->state;
		$order->payment = $request->payment;
		$order->discount = $request->discount;
		$order->description = $request->description;
		$order->lead_time_begin = \Carbon\Carbon::createFromFormat('H:i d.m.Y', $request->lead_time_begin);
		$order->lead_time_finish = \Carbon\Carbon::createFromFormat('H:i d.m.Y', $request->lead_time_finish);
		$order->options = $request->options;
        $order->save();
        return redirect()->route('order.index'/*, ['id' => $order->id]*/);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
