<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $table = 'cart';
    
     /**
     * Get the user that owns this cart.
     */
    public function user()
    {
        return $this->belongsTo('App\User', 'id_user');
    }
    
    /**
     * Get the services that this cart includes.
     */
    public function services()
    {
        $services = $this->belongsToMany('App\Service', 'cart_service', 'id_cart', 'id_service')->withPivot('number');
        return $services;
    }
    
    /**
    * Get full cost of the specified cart item
    *
    * @return float
    */
    public function getItemCost($id_service)
    {
        $service = $this->services->find($id_service);
        return $service->pivot->number * $service->price;
    }
        
    /**
    * Get discount cost of the specified cart item
    *
    * @return float
    */
    public function getDiscountItemCost($id_service)
    {
        return  $this->getItemCost($id_service) * (1 - 0.01 * $this->services->find($id_service)->discount);
    }
}
