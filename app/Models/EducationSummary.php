<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EducationSummary extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'country',
        'grade',
        'graduated',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}