<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserAddress extends Model
{
    protected $fillable = [
        'user_id', 'address', 'city', 'state', 'country', 'zip', 'email', 'phone'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
