<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserAttendSchool extends Model
{
   

    protected $fillable = [
        'user_id',
        'name',
        'location',
        'start_date',
        'end_date',
    ];

    // Relationship to the user
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
