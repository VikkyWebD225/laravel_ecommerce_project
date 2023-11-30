<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Admin extends Model
{
    use HasFactory;

    

    protected $fillable = [
    'name',
    'email',
    'usertype',
    'phone',
    'address',
    'password',
    ];

    protected $table = "admins";

    

    protected $hidden = [
        'password',
        'remember_token',

    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
