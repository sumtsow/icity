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
     * Get the company with specified name.
     */
    public static function getCompanyByName($name)
    {
        $fieldname = 'name_'.app()->getLocale();
        return Company::where($fieldname, $name)->first();
    }
}
