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
        Schema::create('deta_sanguis', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Examen::class)->references('id')->on('examens')->onDelete('cascade'); 
            $table->decimal('glucosaSangui', $precision = 5, $scale = 1);
            $table->decimal('colesterol', $precision = 5, $scale = 1);
            $table->decimal('trigliceridos', $precision = 5, $scale = 1);
            $table->decimal('nitrogenoUreico', $precision = 5, $scale = 1);
            $table->decimal('creatinina', $precision = 5, $scale = 1);
            $table->string('observacionesSangui');
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
        Schema::dropIfExists('deta_sangui');
    }
};
