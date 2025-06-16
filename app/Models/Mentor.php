<?php

// app/Models/Mentor.php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Mentor extends Model
{
    protected $fillable = ['name', 'email', 'phone', 'school', 'country'];
}
