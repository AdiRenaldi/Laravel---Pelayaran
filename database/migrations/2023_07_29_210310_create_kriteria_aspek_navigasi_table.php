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
        Schema::create('kriteria_aspek_navigasi', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('kapal_id');
            $table->foreign('kapal_id')->references('id')->on('kapal');
            $table->string('kriteria_1');
            $table->string('kriteria_2');
            $table->string('kriteria_3');
            $table->string('kriteria_4');
            $table->string('kriteria_5');
            $table->string('cf');
            $table->string('sf');
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
        Schema::dropIfExists('kriteria_aspek_navigasi');
    }
};
