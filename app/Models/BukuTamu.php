<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BukuTamu extends Model
{
    use HasFactory;

    protected $table = 'buku_tamu';
    
    protected $fillable = [
        'nama_organisasi',
        'telpon_organisasi',
        'sosmed_organisasi',
        'asal_instansi',
        'tanggal_berkunjung',
        'tujuan',
        'nama_tamu',
        'alamat_organisasi',
    ];
}