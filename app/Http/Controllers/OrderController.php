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
        $order->description = $request->description;
        $order->lead_time_begin = \Carbon\Carbon::createFromFormat('H:i d.m.Y', $request->lead_time_begin);
        $order->lead_time_finish = \Carbon\Carbon::createFromFormat('H:i d.m.Y', $request->lead_time_finish);
        $order->options = $request->options;
        $order->save();
        if(is_int($request->service)) {
            $order->services()->attach($request->service, ['number' => 1 ]);
        }
        foreach($order->services as $service) {
            if($service->pivot->number != $request->{'service_'.$service->id.'_number'}) {
                $order->services()->updateExistingPivot($service->id, ['number' => $request->{'service_'.$service->id.'_number'} ]);
            }
        }        
        return redirect()->route('order.index'/*, ['id' => $order->id]*/);
    }

    /**
     * Remove the specified service from current order.
     *
     * @param  int  $id
     * @param  int  $id_service
     * @return \Illuminate\Http\Response
     */
    public function removeService($id, $id_service)
    {
        $order = Order::find($id);
        $order->services()->detach($id_service);
        return redirect()->route('order.edit', ['id' => $id]);
    }
    
        /**
     * Remove the specified order from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
