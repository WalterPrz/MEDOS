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
        Schema::create('deta_heces', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Examen::class)->references('id')->on('examens')->onDelete('cascade'); 
            $table->string('colorHeces');
            $table->string('consistencia');
            $table->string('mucus');
            $table->string('bacteriasHeces');
            $table->string('hematiesHeces');
            $table->string('leucocitosHeces');
            $table->string('macroscopicos');
            $table->string('microscopicos');
            $table->string('trofozoitos');
            $table->string('quistes');
            $table->string('huevos');
            $table->string('larvas');
            $table->string('observacionesHeces');
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
        Schema::dropIfExists('deta_heces');
    }
};
