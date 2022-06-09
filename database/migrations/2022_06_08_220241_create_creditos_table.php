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
        Schema::create('creditos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('idProveedor');
            //$table->foreignIdFor(Proveedor::class);
            $table->decimal('credito', $precision = 5, $scale = 2);
            $table->string('diaPago',10);
            $table->integer('plazo');
            $table->decimal('saldoPendiente', $precision = 5, $scale = 2);
            $table->string('fechaCreacion',10);
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
