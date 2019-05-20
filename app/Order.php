<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
        
    /**
     * Get the orders related this service.
     */
    public function services()
    {
        return $this->belongsToMany('\App\Service', 'order_service', 'id_order', 'id_service');
    }
}
