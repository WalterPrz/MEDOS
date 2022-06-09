<?php

use App\Models\Medicamento;
use App\Models\Credito;
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
            $table->foreignIdFor(Medicamento::class)->references('id')->on('medicamentos');
            $table->foreignIdFor(Credito::class)->references('id')->on('creditos');
            $table->string('fechaIngreso',10);
            $table->integer('cantidadIngreso');
            $table->decimal('precioCompra', $precision = 5, $scale = 2);
            $table->decimal('descuentoIngreso', $precision = 5, $scale = 2);
            $table->string('fechaVenc',10);
            $table->decimal('precioCompraUnidad', $precision = 5, $scale = 2);
            $table->decimal('precioVentaUnidad', $precision = 5, $scale = 2);
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
        Schema::dropIfExists('ingreso_medicamentos');
    }
};
