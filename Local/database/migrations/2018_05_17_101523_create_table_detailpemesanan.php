<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableDetailpemesanan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detailpemesanan', function (Blueprint $table) {
            $table->increments('id');
            $table->string('id_pesan');
            $table->foreign('id_pesan')->references('id_pesan')->on('pemesanan');
            $table->string('status');
            $table->string('konfirmasi');
            $table->string('keterangan');
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
        Schema::dropIfExists('detailpemesanan');
    }
}
