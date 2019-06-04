<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\DB;

class User extends Authenticatable //implements MustVerifyEmail
{
    use Notifiable;
    
    protected $table = 'user';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'lastname', 'firstname', 'email', 'password', 'last_ip',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    
    /**
     * Get the cart belongs to this user.
     */
    public function cart()
    {
        return $this->hasOne('App\Cart', 'id_user');
    }
    
    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    
    /**
     * Define the 'birthdate' filed as date
     *
     * @var array
     */    
    protected $dates = ['birthdate'];
    
    /**
     * Get the city for this user.
     */
    
    public function city()
    {
        return $this->belongsTo('\App\City', 'id_city');
    }
    
    /**
     * Get the company for this user (is optional)
     */
    
    public function company()
    {
        return $this->belongsTo('\App\Company', 'id_company');
    }
    
    /**
    * Get the user's full name.
    *
    * @return string
    */
    public function getFullName()
    {
        return "{$this->lastname} {$this->firstname} {$this->patronymic}";
    }
    
    /**
    * Get the user's roles list.
    *
    * @return array of string
    */
    public static function getRoles ()
    {
        // Pulls column string from DB
        $enumStr = DB::select(DB::raw('SHOW COLUMNS FROM `user` WHERE FIELD = "role"'))[0]->Type;

        // Parse string
        preg_match_all("/'([^']+)'/", $enumStr, $matches);

        // Return matches
        return isset($matches[1]) ? $matches[1] : [];
    }
}
