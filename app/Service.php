<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $table = 'service';
    
    public function category()
    {
        return $this->belongsTo('\App\Category');
    }
}
