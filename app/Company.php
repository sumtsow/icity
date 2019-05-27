<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $table = 'company';
    
    // @string path to Companies images directory in Storage
    private $storagePath = 'public/img/company/';
    
    /**
     * Define the 'work_begin', 'work_finish' fileds as dates
     *
     * @var array
     */    
    //protected $dates = ['work_begin', 'work_finish'];
    
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
    
    // Add new Company image to server
    // @param  \Illuminate\Http\Request  $request
    public function addImage($request) 
    {
        $filename = $request->file('image')->getClientOriginalName();
        return $request->file('image')->storeAs($this->storagePath, $filename);
    }
    
    /**
     * Remove this company image from server
    */
    public function removeImage() 
    {
        Storage::delete($this->storagePath.$this->image);
        return true;
    }
}
