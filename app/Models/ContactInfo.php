<?php

// app/Models/ContactInfo.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactInfo extends Model
{
    use HasFactory;

    protected $fillable = [
        'icon_class',
        'title',
        // 'subtitle',
        'link',
        'link_text',
        'description',
    ];
}
