<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    // Table name (optional if it follows Laravel's naming convention)
    protected $table = 'settings';

    // Fillable fields
    protected $fillable = [
        'site_title',
        'logo',
        'favicon',
        'admin_email',
        'user_permissions',
        'enable_notifications',
        'notification_template',
        'payment_gateway',
        'api_key',
        'subscription_price',
    ];

    // Cast fields to specific types
    protected $casts = [
        'enable_notifications' => 'boolean',
        'subscription_price' => 'decimal:2',
    ];
}
