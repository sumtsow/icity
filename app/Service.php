<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Service extends Model
{
    protected $table = 'service';
    
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
    * Get the service's units list.
    *
    * @return array of string
    */
    public static function getUnits ()
    {
        // Pulls column string from DB
        $enumStr = DB::select(DB::raw('SHOW COLUMNS FROM `service` WHERE FIELD = "unit_'.app()->getLocale().'"'))[0]->Type;

        // Parse string
        preg_match_all("/'([^']+)'/", $enumStr, $matches);

        // Return matches
        return isset($matches[1]) ? $matches[1] : [];
    }
}
