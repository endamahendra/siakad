<?php

// app/Models/Pengguna.php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;



    
class Pengguna extends Authenticatable implements MustVerifyEmail
{
    use Notifiable;
    use HasFactory;
    protected $table = 'penggunas';
    protected $dates = ['created_at', 'updated_at'];

    //protected $guard_name = 'web'; // Atur penjaga untuk model User

    protected $fillable = [
        'nama', 'email', 'password', 'bagian', 
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];
}

