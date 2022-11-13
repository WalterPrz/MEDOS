<?php

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
<<<<<<<< HEAD:database/migrations/2022_10_17_232429_permiso_farmacias_table.php
        Schema::create('permiso_farmacias', function (Blueprint $table) {
            $table->id();
            $table->string('nombrePermisoFarm',2048);
            $table->decimal('monto',5,2);
========
        Schema::create('abonos', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Credito::class)->references('id')->on('creditos');
            $table->decimal('cantidadAbonada', $precision = 5, $scale = 2)->nullable();
            $table->string('fechaAbono',10)->nullable();
>>>>>>>> 909b0c87f272d85cda0209e265318a4e8214ec13:database/migrations/2022_10_18_112320_create_abonos_table.php
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
<<<<<<<< HEAD:database/migrations/2022_10_17_232429_permiso_farmacias_table.php
        Schema::dropIfExists('permiso_farmacias');
========
        Schema::dropIfExists('abonos');
>>>>>>>> 909b0c87f272d85cda0209e265318a4e8214ec13:database/migrations/2022_10_18_112320_create_abonos_table.php
    }
};
