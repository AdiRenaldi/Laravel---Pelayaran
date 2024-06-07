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
        Schema::create('gap_mesin', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('kapal_id');
            $table->foreign('kapal_id')->references('id')->on('kapal');
            $table->integer('kriteria_1');
            $table->integer('kriteria_2');
            $table->integer('kriteria_3');
            $table->integer('kriteria_4');
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
        Schema::dropIfExists('gap_mesin');
    }
};
