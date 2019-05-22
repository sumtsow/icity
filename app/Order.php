<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    /**
     * Define the 'lead_time_begin', 'lead_time_finish' fileds as dates
     *
     * @var array
     */    
    protected $dates = ['lead_time_begin', 'lead_time_finish'];
    
    /**
     * Get the services related this order.
     */
    public function services()
    {
        return $this->belongsToMany('\App\Service', 'order_service', 'id_order', 'id_service');
    }
    
    /**
     * Get the orders related this service.
     */
    public function user()
    {
        return $this->belongsTo('\App\User', 'id_user');
    }
}
