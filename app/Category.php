<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'category';
        
    /**
     * Get the services for this category.
     */
    public function service()
    {
        return $this->hasMany('\App\Service', 'id_category');
    }  
    
}
