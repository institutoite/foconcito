<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePersonasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('personas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre', 25);
            $table->string('apellidos',50);
        

            $table->date('fechanacimiento');
            $table->string('tipo',20);
            
            $table->string('genero', 20)->nullable();
            
            $table->unsignedInteger('pais_id');
            $table->foreign('pais_id','fk_pais_persona')
                        ->references('id')->on('pais')->default(1);

            $table->unsignedInteger('ciudad_id');
            $table->foreign('ciudad_id','fk_ciudad_persona')
                        ->references('id')->on('ciudads');

            $table->unsignedInteger('zona_id');
            $table->foreign('zona_id','fk_zona_persona')
                        ->references('id')->on('zonas');

            $table->unsignedInteger('persona_id')->nullable();
            $table->foreign('persona_id','fk_persona_persona')
                        ->references('id')->on('personas');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('personas');
    }
}
