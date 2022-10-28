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
        Schema::create('referencia_externas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('idExpediente');
            $table->string('ruta',2048);
            $table->string('nombreReferencia',2048);
            $table->foreign('idExpediente')->references('id')->on('expedientes');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('referencia_externas');
    }
};
