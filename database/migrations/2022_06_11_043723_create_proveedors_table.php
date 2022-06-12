<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('proveedors', function (Blueprint $table) {
            $table->id();
            $table->string('nombreProveedor',100);
            $table->string('telefonoProveedor',12);
            $table->string('nombreVendedor',100);
            $table->string('telefonoVendedor',12);
            $table->integer('plazoDevolucion');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::dropIfExists('proveedors');
    }
};
