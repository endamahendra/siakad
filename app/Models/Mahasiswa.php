<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    protected $fillable = [
        'Nama', 'Alamat', 'Nomor_Telepon', 'Email', 'Tanggal_Masuk', 'Program_Studi'
        // Tambahkan kolom-kolom lain yang bisa diisi
    ];
}
