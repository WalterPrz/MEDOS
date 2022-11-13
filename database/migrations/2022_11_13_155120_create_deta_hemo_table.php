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
        Schema::create('deta_hemo', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Examen::class)->references('id')->on('examens')->onDelete('cascade'); 
            $table->integer('globRojos');
            $table->decimal('hematocrito', $precision = 5, $scale = 1);
            $table->decimal('hemoglobinaHemo', $precision = 5, $scale = 1);
            $table->decimal('vcm', $precision = 5, $scale = 1);
            $table->decimal('hbcm', $precision = 5, $scale = 1);
            $table->decimal('chbcm', $precision = 5, $scale = 1);
            $table->integer('plaquetas');
            $table->string('vn');
            $table->string('reticulocitos');
            $table->string('eritrosedimentacion');
            $table->integer('globBlancos');
            $table->decimal('neutrofilosBanda', $precision = 4, $scale = 1);
            $table->decimal('neutrofilosSegmen', $precision = 4, $scale = 1);
            $table->decimal('eosinofilios', $precision = 4, $scale = 1);
            $table->decimal('basofilios', $precision = 4, $scale = 1);
            $table->decimal('linfocitos', $precision = 4, $scale = 1);
            $table->decimal('monocitos', $precision = 4, $scale = 1);
            $table->string('observacionesHemo');
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
        Schema::dropIfExists('deta_hemo');
    }
};
