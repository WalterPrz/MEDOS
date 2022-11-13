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
        Schema::create('deta_exa', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Examen::class)->references('id')->on('examens')->onDelete('cascade'); 
            $table->string('nombreExamen');
            $table->string('valorExamen');
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
        Schema::dropIfExists('deta_exa');
    }
};
