<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserProgramApplyNow extends Model
{
   
    protected $fillable = ['full_name', 'dob', 'location', 'whats_app_number', 'email','studies_level','program_id'];
}
