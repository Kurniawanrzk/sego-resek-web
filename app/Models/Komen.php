<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Komen extends Model
{
    use HasFactory;
    protected $table = "komen";
    protected $primaryKey = "token_komentar";
    protected $keyType = 'string';
    protected $fillable = [
        "token_komentar",
        "komen"
    ];
    public $timestamps = false;

}
