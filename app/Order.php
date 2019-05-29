<?php

namespace App;

use App\Service;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

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
        return $this->belongsToMany('\App\Service', 'order_service', 'id_order', 'id_service')->withPivot('number');
    }
    
    /**
     * Get the orders related this service.
     */
    public function user()
    {
        return $this->belongsTo('\App\User', 'id_user');
    }
    
    /**
    * Get the order's possible states
    *
    * @return array of string
    */
    public static function getStates ()
    {
        // Pulls column string from DB
        $enumStr = DB::select(DB::raw('SHOW COLUMNS FROM `orders` WHERE FIELD = "state"'))[0]->Type;

        // Parse string
        preg_match_all("/'([^']+)'/", $enumStr, $matches);

        // Return matches
        return isset($matches[1]) ? $matches[1] : [];
    }
    
    /**
    * Get full cost of the specified order item
    *
    * @return float
    */
    public function getItemCost($id_service)
    {
        $service = $this->services->find($id_service);
        return $service->pivot->number * $service->price;
    }
        
    /**
    * Get discount cost of the specified order item
    *
    * @return float
    */
    public function getDiscountItemCost($id_service)
    {
        return  $this->getItemCost($id_service) * (1 - 0.01 * $this->services->find($id_service)->discount);
    }
    
    /**
    * Get total costs of all order items
    *
    * @return float
    */
    public function getTotalCosts()
    {
        $totalCosts = 0;
        foreach($this->services as $service) {
            $totalCosts += $service->pivot->number * $service->price * (1 - 0.01 * $service->discount);
        }
        return $totalCosts;
    }
}
