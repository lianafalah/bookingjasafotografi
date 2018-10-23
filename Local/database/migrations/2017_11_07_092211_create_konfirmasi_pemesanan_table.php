<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKonfirmasiPemesananTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('konfirmasi_pembayaran', function (Blueprint $table) {
            $table->increments('id');
            $table->string('id_pesan')->unique();
            $table->foreign('id_pesan')->references('id_pesan')->on('pemesanan');
            $table->string('nama',25);
            $table->string('nama_bank',35);
            $table->string('no_rekening',30);
            $table->integer('nominal');
            $table->date('tanggal');
            $table->string('foto_bukti');
            $table->string('status',25)->nullable();
            $table->string('id_petugas',20)->nullable();
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
        Schema::dropIfExists('konfirmasi_pemesanan');
    }
}
