<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stat extends Model
{
   protected $fillable = [
    'students_helped',
    'programs_offered',
    'institutions',
    'countries',
];

}
