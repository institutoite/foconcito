<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableMensajePersona extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mensaje_persona', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('persona_id');
            $table->foreign('persona_id','fk_persona_mensaje_persona')
                        ->references('id')->on('personas');
                 
            $table->unsignedInteger('mensaje_id');
            $table->foreign('mensaje_id','fk_persona_mensaje_mensaje')
                        ->references('id')->on('mensajes');
                     
            $table->unsignedInteger('telefono_id');
            $table->foreign('telefono_id','fk_persona_mensaje_telefono')
                        ->references('id')->on('telefonos');
                   
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mensaje_persona');
    }
}
