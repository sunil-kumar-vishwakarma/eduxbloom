<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MyApplication extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'program_id',
        'payment_status',
        'status',
    ];

    // Relation with User
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function program()
    {
        return $this->belongsTo(Program::class);
    }
}