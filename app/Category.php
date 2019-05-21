<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'category';
    
    // @string path to Category's images directory in Storage
    private $storagePath = 'public/img/category/';
        
    /**
     * Get the services for this category.
     */
    public function service()
    {
        return $this->hasMany('\App\Service', 'id_category');
    }
    
    // Add new Category image to server
    // @param  \Illuminate\Http\Request  $request
    public function addImage($request) 
    {
        $filename = $request->file('image')->getClientOriginalName();
        return $request->file('image')->storeAs($this->storagePath, $filename);
    }
    
}
