<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Tymon\JWTAuth\Contracts\JWTSubject;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Spatie\Permission\Traits\HasRoles;
class Users extends Authenticatable implements JWTSubject, MustVerifyEmail
{
    use Notifiable;

    use HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'email', 'password','role_id'];


    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];
   public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    /**
     * Return a key-value array containing any custom claims.
     */
    public function getJWTCustomClaims()
    {
        return [];
    }
    public function details()
    {
        return $this->hasOne(UserDetail::class, 'user_id');
    }
    public function address()
    {
        return $this->hasOne(UserAddress::class);
    }

    public function attendedSchools()
    {
        return $this->hasMany(UserAttendSchool::class);
    }
    public function testScores()
    {
        return $this->hasMany(UserTestScore::class);
    }
}
