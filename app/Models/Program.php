<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Program extends Model
{
    use HasFactory;

    protected $fillable = [
        'university_name',
        'certificate',
        'college_name',
        'college_url',
        'college_course',
        'location',
        'campus_country',
        'campus_city',
        'tuition',
        'application_fee',
        'duration',
        'success_prediction',
        'details',
        'image',
        'language',
        'program_level',
        'field_of_study',
        'field_of_study_sub_catagory',
        // 'status'
    ];

    // If you want to access the image file path directly
    public function getImageUrlAttribute()
    {
        return $this->image ? asset('storage/' . $this->image) : null;
    }
}
