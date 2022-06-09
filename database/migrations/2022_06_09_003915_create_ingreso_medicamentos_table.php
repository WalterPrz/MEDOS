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
        Schema::create('ingreso_medicamentos', function (Blueprint $table) {
            $table->id();
            $table->date('fecha_ingreso');
            $table->unsignedBigInteger('medicamento_id')->unsigned();
            $table->tinyInteger('cantidad_ingreso');
            $table->decimal('precio_compra', $precision =6, $scale = 2);
            $table->decimal('descuento_ingreso', $precision =6, $scale = 2);
            $table->date('fecha_vencimiento');
            $table->decimal('precio_compra_unidad', $precision =6, $scale = 2);
            $table->decimal('precio_venta_unidad', $precision =6, $scale = 2);
            $table->foreign('medicamento_id')->references('id')->on('medicamentos');
            $table->softDeletes();
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
        Schema::dropIfExists('ingreso_medicamentos');
    }
};
