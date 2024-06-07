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
        Schema::create('target_administrasi', function (Blueprint $table) {
            $table->id();
            $table->string('laporanKedatangan');
            $table->string('daftarAwak');
            $table->string('suratPernyataan');
            $table->string('bukuKesehatan');
            $table->string('menifesPenumpang');
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
        Schema::dropIfExists('target_administrasi');
    }
};
