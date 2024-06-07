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
        Schema::create('target_navigasi', function (Blueprint $table) {
            $table->id();
            $table->string('perlengkapanNavigasi');
            $table->string('perangkatRadio');
            $table->string('izinKomunikasiRadio');
            $table->string('dayaApungPenolong');
            $table->string('labelKapal');
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
        Schema::dropIfExists('target_navigasi');
    }
};
