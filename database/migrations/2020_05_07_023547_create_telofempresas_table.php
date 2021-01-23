<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTelofempresasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('telofempresas', function (Blueprint $table) {
           $table->increments('id');
            $table->string('prefijo', 15);
            $table->string('numero', 15);
            $table->string('detalle', 100);
            $table->unsignedInteger('empresa_id');
            $table->foreign('empresa_id','fk_empresa_telofempresa')
                        ->references('id')->on('empresas');
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
        Schema::dropIfExists('telofempresas');
    }
}
