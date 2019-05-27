<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Plan extends Model
{
    protected $table = 'plan';
            
    /**
     * Get companies served according with this plan.
     */
    public function company()
    {
        return $this->hasMany('\App\Company', 'id_plan');
    }
}
