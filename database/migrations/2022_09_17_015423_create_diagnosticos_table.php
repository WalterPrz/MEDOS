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
        Schema::create('diagnosticos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('idExpediente');
            $table->date('fechaDiagnostico');
            $table->decimal('peso', $precision = 5, $scale = 2)->nullable();
            $table->decimal('altura', $precision = 5, $scale = 2)->nullable();
            $table->string('descripcionDiagnostico',2048);
            $table->foreign('idExpediente')->references('id')->on('expedientes');
            $table->string('descripcionReceta',2048);
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
        Schema::dropIfExists('diagnosticos');
    }
};
