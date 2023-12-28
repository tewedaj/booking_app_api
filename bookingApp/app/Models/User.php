<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'phone_number',
        'location',
        'password',
        // Add other fillable fields here
    ];

    protected $hidden = [
        'password',
        'remember_token',
        // Hide other sensitive fields if needed
    ];

    // Other model configurations and relationships can go here...
}
