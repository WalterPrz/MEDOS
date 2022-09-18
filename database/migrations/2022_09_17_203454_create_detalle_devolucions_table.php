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
        Schema::create('detalle_devolucions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('detalle_ingreso_id')->unsigned();
            $table->foreign('detalle_ingreso_id')->references('id')->on('detalle_ingresos');
            $table->unsignedBigInteger('devolucion_id')->unsigned();
            $table->foreign('devolucion_id')->references('id')->on('devolucions');
            $table->unsignedBigInteger('cantidad')->unsigned();
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
        Schema::dropIfExists('detalle_devolucions');
    }
};
