<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Balasan extends Model
{
    use HasFactory;
    protected $table = "balasan";
    protected $primaryKey = "id_balasan";
    protected $fillable = [
        "balasan",
        "created_at"
    ];
    public $timestamps = false;

}
