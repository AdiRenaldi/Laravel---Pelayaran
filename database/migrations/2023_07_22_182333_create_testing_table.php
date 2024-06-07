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
        Schema::create('testing', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_kapal');
            $table->foreign('id_kapal')->references('id')->on('kapal');
            $table->unsignedBigInteger('id_spesifikasi');
            $table->foreign('id_spesifikasi')->references('id')->on('spesifikasi');
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
        Schema::dropIfExists('testing');
    }
};
