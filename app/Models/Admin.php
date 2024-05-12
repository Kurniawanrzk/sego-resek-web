<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Admin extends Authenticatable
{
    use HasFactory;

    protected $table = 'admins';
    protected $primaryKey = 'username';
    protected $keyType = 'string';
    protected $fillable = [
        "password",
        "username"
    ];

    protected $hidden = [
        'password',
    ];

    public $timestamps = false;


}
