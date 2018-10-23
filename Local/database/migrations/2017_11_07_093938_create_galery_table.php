<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGaleryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('galery', function (Blueprint $table) {
            $table->increments('id');
            $table->string('id_galery',15)->unique();
            $table->string('nama_galery',35);
            $table->string('style',35);
            $table->string('tipe',35);
            $table->date('tanggal');
            $table->string('status',30);
            $table->string('terbaru',30);
            $table->string('slider',30);
            $table->string('caption',30)->nullable();
            $table->string('gambar',255);
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
        Schema::dropIfExists('galery');
    }
}
