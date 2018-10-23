<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePemesananTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pemesanan', function (Blueprint $table) {
            $table->increments('id');
            $table->string('id_pesan',15)->unique();
            $table->string('id_paket',15);
            $table->foreign('id_paket')->references('id_paket')->on('paket');
            $table->string('id_member',15);
            $table->date('tanggal_foto');
            $table->date('tanggal_pesan');
            $table->string('pukul',10);
            $table->integer('sisa')->nullable();
            $table->string('status',50)->nullable();
            $table->string('lokasi',1 00)->nullable();
            $table->date('tanggal_ambil')->nullable();
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
        Schema::dropIfExists('pemesanan');
    }
}
