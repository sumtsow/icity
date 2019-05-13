<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable implements MustVerifyEmail
{
    use Notifiable;
    
    protected $table = 'user';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'lastname', 'firstname', 'email', 'password',
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
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    
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
}
