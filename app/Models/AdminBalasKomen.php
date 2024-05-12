<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdminBalasKomen extends Model
{
    use HasFactory;
    protected $table = 'admin_balas_komen';
    protected $fillable = [
        "admin_usn",
        "id_balasan_admin",
        "token_komentar_pengunjung",
        "id_menu"
    ];
    public $timestamps = false;

}
