<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Tymon\JWTAuth\Contracts\JWTSubject;

use Spatie\Permission\Traits\HasRoles;
// class User extends Authenticatable
class User extends Authenticatable implements JWTSubject, MustVerifyEmail
{
    use Notifiable;
    use HasRoles;
    public function profile()
    {
        return $this->hasOne(Profile::class);
    }

    

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'email', 'phone', 'address', 'birthday', 'designation'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
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
