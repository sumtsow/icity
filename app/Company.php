<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $table = 'company';
    
    /**
     * Get the services provided by this company.
     */
    public function service()
    {
        return $this->hasMany('\App\Service', 'id_company');
    }
        
    /**
     * Get the tariff plan using by this company.
     */
    
    public function plan()
    {
        return $this->belongsTo('\App\Plan', 'id_plan');
    }
    
    /**
     * Get the city for this company.
     */
    
    public function city()
    {
        return $this->belongsTo('\App\City', 'id_city');
    }
    
    /**
     * Get the company with specified name.
     */
    public static function getCompanyByName($name)
    {
        $fieldname = 'name_'.app()->getLocale();
        return Company::where($fieldname, $name)->first();
    }
    
}
