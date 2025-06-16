<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    use HasFactory;

    protected $table = 'profiles';

    protected $fillable = [
        'name',
        'email',
        'phone',
        'address',
        'birthday',
        'profile_photo',
    ];
}
