<?php

use App\Models\IngresoMedicamento;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Medicamento;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detalle_ingresos', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(IngresoMedicamento::class)->references('id')->on('ingreso_medicamentos');
            $table->foreignIdFor(Medicamento::class)->references('id')->on('medicamentos');
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
        Schema::dropIfExists('detalle_ingresos');
    }
};
