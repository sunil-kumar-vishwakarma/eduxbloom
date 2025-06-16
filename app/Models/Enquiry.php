<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Enquiry extends Model
{
    use HasFactory;

    protected $fillable = [
        'full_name',
        'email',
        'contact',
        'country',
        'enquiry_date',
        'status',
    ];

    protected $casts = [
        'enquiry_date' => 'date',
    ];
    
}
