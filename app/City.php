<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    protected $table = 'city';
    
    /**
     * Get the services for this category.
     */
    public function user()
    {
        return $this->hasMany('\App\User');
    }
        
    /**
     * Get the city with specified name.
     */
    public static function getCityByName($name)
    {
        $fieldname = 'name_'.app()->getLocale();
        return City::where($fieldname, $name)->first();
    }
}
