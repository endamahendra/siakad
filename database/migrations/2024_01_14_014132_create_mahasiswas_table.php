<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMahasiswasTable extends Migration
{
    public function up()
    {
        Schema::create('mahasiswas', function (Blueprint $table) {
            $table->id(); // Ini membuat kolom 'id' sebagai primary key
            $table->string('Nama');
            $table->string('Alamat');
            $table->string('Nomor_Telepon');
            $table->string('Email')->unique();
            $table->date('Tanggal_Masuk');
            $table->string('Program_Studi');
            // Tambahkan kolom-kolom lain jika diperlukan
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('mahasiswas');
    }
}
