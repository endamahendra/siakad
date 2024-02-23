<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMapelsTable extends Migration
{
    public function up()
    {
        Schema::create('mapels', function (Blueprint $table) {
            $table->id();
            $table->text('kode');
            $table->string('nama');
            $table->unsignedBigInteger('prodi_id');
             $table->foreign('prodi_id')->references('id')->on('prodis');
            // Tambahkan kolom lain sesuai kebutuhan, misalnya:
            // $table->integer('durasi')->nullable();
            // $table->date('tanggal_mulai')->nullable();
            // ...

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('mapels');
    }
}
