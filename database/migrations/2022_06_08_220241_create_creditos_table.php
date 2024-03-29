<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Proveedor;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('creditos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('proveedor_id')->unsigned();
            //$table->foreignIdFor(Proveedor::class)->references('id')->on('proveedors');
            $table->decimal('credito', $precision = 5, $scale = 2)->nullable();
            $table->string('diaPago',10)->nullable();
            $table->integer('plazo')->nullable();
            $table->decimal('saldoPendiente', $precision = 5, $scale = 2)->nullable();
            $table->string('fechaCreacion',10)->nullable();
            $table->foreign('proveedor_id')->references('id')->on('proveedors');
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
        Schema::dropIfExists('creditos');
    }
};
