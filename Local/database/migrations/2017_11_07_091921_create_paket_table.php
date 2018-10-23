<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePaketTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('paket', function (Blueprint $table) {
            $table->increments('id');
            $table->string('id_paket',15)->unique();
            $table->string('nama_paket',50);
            $table->string('tipe',25);
            $table->integer('harga_paket');
            $table->integer('dp')->nullable();
            $table->string('keterangan',255);
            $table->string('gambar',100);
            $table->string('id_petugas',20);
            $table->foreign('id_petugas')->references('id_petugas')->on('users');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('paket');
    }
}
