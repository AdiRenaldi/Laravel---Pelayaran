<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('navigasi', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('kapal_id');
            $table->foreign('kapal_id')->references('id')->on('kapal');
            $table->integer('perlengkapanNavigasi');
            $table->integer('perangkatRadio');
            $table->integer('izinKomunikasiRadio');
            $table->integer('dayaApungPenolong');
            $table->integer('labelKapal');
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
        Schema::dropIfExists('navigasi');
    }
};
