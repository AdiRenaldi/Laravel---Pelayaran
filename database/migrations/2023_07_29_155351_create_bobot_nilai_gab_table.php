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
        Schema::create('bobot_nilai_gab', function (Blueprint $table) {
            $table->id();
            $table->integer('sesuaiDibutuhkan');
            $table->integer('kelebihan_1_tingkat');
            $table->integer('kekurangan_1_tingkat');
            $table->integer('kelebihan_2_tingkat');
            $table->integer('kekurangan_2_tingkat');
            $table->integer('kelebihan_3_tingkat');
            $table->integer('kekurangan_3_tingkat');
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
        Schema::dropIfExists('bobot_nilai_gab');
    }
};
