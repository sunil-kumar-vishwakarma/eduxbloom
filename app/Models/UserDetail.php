<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserDetail extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'middle_name', 'dob', 'language', 'citizenship',
        'passport_number', 'passport_expiry', 'marital_status', 'gender',
    ];

     public function user()
    {
        return $this->belongsTo(User::class);
    }
}

