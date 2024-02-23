<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prodi extends Model 
{
    use HasFactory;
    protected $primaryKey = 'id';
    protected $fillable = ['nama_prodi', 'jenjang_id'];
     public function jenjang(){
      return $this->belongsTo('App\Models\Jenjang', 'jenjang_id');
    }
        public function mapels()
    {
        return $this->hasMany(Mapel::class);
    }
}
   