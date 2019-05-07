<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

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
}
