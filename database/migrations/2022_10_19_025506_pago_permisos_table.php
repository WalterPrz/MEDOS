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
        Schema::create('pago_permisos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('idPermisoFarmacia');
            $table->date('fechaPago');
            $table->foreign('idPermisoFarmacia')->references('id')->on('permiso_farmacias');
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
        Schema::dropIfExists('pago_permisos');
    }

};
