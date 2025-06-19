<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserTestScore extends Model
{
    //
    protected $table = 'user_tests_score';
    protected $fillable = [
        'user_id', 'test_type', 'reading', 'listening', 'writing', 'speaking', 'exam_date',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
