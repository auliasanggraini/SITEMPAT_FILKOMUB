<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Peminjaman extends Model
{
    use HasFactory;

    protected $table = 'peminjaman';  // Nama tabel di database

    // Definisikan field yang dapat diisi secara massal
    protected $fillable = [
        'ruangan_id',
        'user_id',
        'waktu_mulai',
        'waktu_selesai',
        'tujuan',
        'status'
    ];
}
