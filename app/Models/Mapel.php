<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mapel extends Model
{
    use HasFactory;

    protected $fillable = [
        'kode', 'nama', 'prodi_is',
        // Tambahkan field lain sesuai kebutuhan, misalnya:
        // 'durasi', 'tanggal_mulai', ...
    ];
    //     public function prodi()
    // {
    //     return $this->belongsTo(Prodi::class);
    // }
       public function prodis()
    {
        return $this->belongsToMany(Prodi::class, 'mapel_prodi', 'mapel_id', 'prodi_id');
    }
}

