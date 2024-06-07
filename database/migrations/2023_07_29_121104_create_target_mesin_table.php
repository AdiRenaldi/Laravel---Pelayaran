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
        Schema::create('target_mesin', function (Blueprint $table) {
            $table->id();
            $table->string('mesinUtama');
            $table->string('mesinBantu');
            $table->string('teganganListrik');
            $table->string('bahanBakar');
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
        Schema::dropIfExists('target_mesin');
    }
};
