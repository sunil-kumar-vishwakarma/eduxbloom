<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GreGmatScore extends Model
{
    protected $fillable = [
        'user_id', 'exam_type', 'score', 'exam_date',
    ];
}
