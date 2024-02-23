<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJenjangsTable extends Migration
{
    public function up()
    {
        Schema::create('jenjangs', function (Blueprint $table) {
            $table->id();
            $table->string('jenjang')->unique(); // Field untuk menyimpan jenis jenjang
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('jenjangs');
    }
}
