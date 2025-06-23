<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ConsultationBook extends Model
{
    //
    protected $fillable = [
        'full_name',
        'email',
        'phone',
        'book_date',
    ];
}
