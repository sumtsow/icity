<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class Service extends Model
{
    protected $table = 'service';
    
    // @string path to Service's images directory in Storage
    private $storagePath = 'public/img/service/';
    
    /**
     * Get the category included this service.
     */
    public function category()
    {
        return $this->belongsTo('\App\Category', 'id_category');
    }
    
    /**
     * Get the company provided this service.
     */
    public function company()
    {
        return $this->belongsTo('\App\Company', 'id_company');
    }
    
    /**
     * Get the orders related this service.
     */
    public function orders()
    {
        return $this->belongsToMany('\App\Order', 'order_service', 'id_service', 'id_order');
    }
    
    /**
    * Get the service's units list.
    *
    * @return array of string
    */
    public static function getUnits ($locale)
    {
        // Pulls column string from DB
        $enumStr = DB::select(DB::raw('SHOW COLUMNS FROM `service` WHERE FIELD = "unit_'.$locale.'"'))[0]->Type;

        // Parse string
        preg_match_all("/'([^']+)'/", $enumStr, $matches);

        // Return matches
        return isset($matches[1]) ? $matches[1] : [];
    }
    
    // Add new Service image to server
    // @param  \Illuminate\Http\Request  $request
    public function addImage($request) 
    {
        $filename = $request->file('image')->getClientOriginalName();
        return $request->file('image')->storeAs($this->storagePath, $filename);
    }
            
    /**
     * Remove this Service image from server
    */
    public function removeImage() 
    {
        Storage::delete($this->storagePath.$this->image);
        return true;
    }
}
