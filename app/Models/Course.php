<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'school_id'];

    public function school()
    {
        return $this->belongsTo(School::class);
    }

    public function enrollments()
    {
        return $this->hasMany(Enrollment::class);
    }
}
