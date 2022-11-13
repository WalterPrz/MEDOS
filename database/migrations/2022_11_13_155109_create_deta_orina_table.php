<?php

use App\Models\Examen;
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
        Schema::create('deta_orinas', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Examen::class)->references('id')->on('examens')->onDelete('cascade'); 
            $table->string('colorOrina');
            $table->string('aspecto');
            $table->decimal('densidad', $precision = 5, $scale = 3);
            $table->decimal('ph', $precision = 3, $scale = 2);
            $table->string('nitritos');
            $table->string('proteinas',$precision = 4, $scale = 1);
            $table->string('glucosOrina');
            $table->string('cetonicos');
            $table->string('urobilinogeno');
            $table->string('bilirrubina');
            $table->string('SangreOculta');
            $table->string('leucocitaria');
            $table->string('hemoglobinaOrina');
            $table->string('cilindros');
            $table->string('hematiesOrina');
            $table->string('leucocitosOrina');
            $table->string('escamosas');
            $table->string('oxalatosCalcio');
            $table->string('bacteriasOrina');
            $table->string('parasitologico');
            $table->string('observacionesOrina');
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
        Schema::dropIfExists('deta_orina');
    }
};
