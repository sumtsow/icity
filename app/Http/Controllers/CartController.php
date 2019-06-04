<?php

namespace App\Http\Controllers;

use App\Cart;
use App\Http\Requests\UpdateCart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    /**
     * Display a view of the cart.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('cart.index', [
            //'cart' => Cart::where('id_user', Auth::id())->first(),
        ]);
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
     * Add new service to cart.
     *
     * @param  int  $id_service
     * @param  \App\Http\Requests\UpdateCart $request
     * @return \Illuminate\Http\Response
     */
    public function store(UpdateCart $request)
    {
        $cart = Cart::where('id_user', Auth::id())->first();
        $cart->services()->attach($request->id_service, ['number' => $request->number] );
        $cart->save();
        return redirect()->to('/service/view/'.$request->id_service);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id_user
     * @return \Illuminate\Http\Response
     */
    public function show($id_user)
    {
        return view('cart.show', [
            'cart' => Cart::find()->where('id_user', $id_user),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function edit(Cart $cart)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCart $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCart $request, $id)
    {
        $cart = Cart::find($id);
        $cart->save();
        foreach($cart->services as $service) {
            if($service->pivot->number != $request->{'service_'.$service->id.'_number'}) {
                $cart->services()->updateExistingPivot($service->id, ['number' => $request->{'service_'.$service->id.'_number'} ]);
            }
        }        
        return redirect()->route('cart.index');
    }

    /**
     * Remove the specified service from cart.
     *
     * @param  int  $id
     * @param  int  $id_service
     * @return \Illuminate\Http\Response
     */
    public function removeService($id, $id_service)
    {
        $cart = Cart::find($id);
        $cart->services()->detach($id_service);
        return redirect()->route('cart.index');
    }
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cart $cart)
    {
        //
    }
}
