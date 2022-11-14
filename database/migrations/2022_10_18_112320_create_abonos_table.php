<?php

use App\Models\Credito;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
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
        Schema::create('abonos', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Credito::class)->references('id')->on('creditos');
            $table->decimal('cantidadAbonada', $precision = 5, $scale = 2)->nullable();
            $table->string('fechaAbono',10)->nullable();
            $table->timestamps();
            $table->softDeletes();
        });

        DB::unprepared("DROP PROCEDURE IF EXISTS ventasPorSemana;
                        CREATE PROCEDURE ventasPorSemana()
                        BEGIN
                        CREATE TEMPORARY TABLE dias (
                            id INT,
                            dia varchar(14));
                        INSERT INTO dias(id,  dia) VALUES (1,'Lunes'),(2,'Martes'), (3,'Miercoles'), (4,'Jueves'),(5,'Viernes'),(6,'Sabado'), (7,'Domingo');

                        CREATE TEMPORARY TABLE cantidadV(
                            id INT,
                            cant INT
                        );  
                        INSERT INTO cantidadV
                        SELECT 1, (SELECT COUNT(*) FROM ventas WHERE fecha_venta= DATE(DATE_ADD(DATE(NOW()), INTERVAL -WEEKDAY(NOW()) DAY)) AND estado=1);
                        INSERT INTO cantidadV
                        SELECT 2, (SELECT COUNT(*) FROM ventas WHERE fecha_venta= DATE(DATE_ADD(DATE(NOW()), INTERVAL -WEEKDAY(NOW()) DAY)+1) AND estado=1);
                        INSERT INTO cantidadV
                        SELECT 3, (SELECT COUNT(*) FROM ventas WHERE fecha_venta= DATE(DATE_ADD(DATE(NOW()), INTERVAL -WEEKDAY(NOW()) DAY)+2) AND estado=1);
                        INSERT INTO cantidadV
                        SELECT 4, (SELECT COUNT(*) FROM ventas WHERE fecha_venta= DATE(DATE_ADD(DATE(NOW()), INTERVAL -WEEKDAY(NOW()) DAY)+3) AND estado=1);
                        INSERT INTO cantidadV
                        SELECT 5, (SELECT COUNT(*) FROM ventas WHERE fecha_venta= DATE(DATE_ADD(DATE(NOW()), INTERVAL -WEEKDAY(NOW()) DAY)+4) AND estado=1);
                        INSERT INTO cantidadV
                        SELECT 6, (SELECT COUNT(*) FROM ventas WHERE fecha_venta= DATE(DATE_ADD(DATE(NOW()), INTERVAL -WEEKDAY(NOW()) DAY)+5) AND estado=1);
                        INSERT INTO cantidadV
                        SELECT 7, (SELECT COUNT(*) FROM ventas WHERE fecha_venta= DATE(DATE_ADD(DATE(NOW()), INTERVAL -WEEKDAY(NOW()) DAY)+6) AND estado=1);

                        SELECT dia, cant FROM dias a
                        INNER JOIN cantidadV b ON b.id = a.id;
                        END;");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('abonos');
    }
};
