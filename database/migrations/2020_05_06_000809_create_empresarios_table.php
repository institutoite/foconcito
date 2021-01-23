<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmpresariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('empresarios', function (Blueprint $table) {
            $table->increments('id');
            
            $table->unsignedInteger('persona_id');
            $table->foreign('persona_id','fk_persona_empresario')
                        ->references('id')->on('personas');
                      
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
        Schema::dropIfExists('empresarios');
    }
}
