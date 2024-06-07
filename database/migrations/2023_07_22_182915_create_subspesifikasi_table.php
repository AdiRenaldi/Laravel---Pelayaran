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
        Schema::create('subspesifikasi', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_spesifikasi');
            $table->foreign('id_spesifikasi')->references('id')->on('spesifikasi');
            $table->string('nama');
            $table->bigInteger('bobot');
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
        Schema::dropIfExists('subspesifikasi');
    }
};
