<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TokenKomentar extends Model
{
    use HasFactory;
    protected $table ="token_komentar";
    protected $fillable = [
        "token_komentar",
        "date"
    ];
    public $timestamps = false;

}
