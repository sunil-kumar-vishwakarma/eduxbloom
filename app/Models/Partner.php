<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Partner extends Model
{
    use HasFactory;

    // Define the table name if it's different from the plural form of the model
    protected $table = 'partners';  // If your table is 'partners', this line can be omitted.

    // Define the fillable properties to prevent mass assignment vulnerabilities
    protected $fillable = [
        'designation',
        'email',
        'password', 
        // 'contact',
        // 'category', 
        // 'joined_date',
    ];

    protected $casts = [
        'joined_date' => 'datetime', // Ensure joined_date is cast to a datetime
    ];

    // If you're using timestamps, Laravel will automatically manage created_at and updated_at fields.
    // If you're not using them, set the following property to false.
    public $timestamps = true;

    // You can define other methods here for relationships, scopes, or custom functionality.
}
