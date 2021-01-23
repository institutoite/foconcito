<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmpresasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('empresas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('empresa', 100);
            $table->string('direccion', 200);
            $table->integer('votos')->unsigned();
            $table->string('detalle',5000)->nullable();
            $table->boolean('destacado')->default(false);
            $table->boolean('publico')->default(false);
            $table->boolean('visible')->default(true);
            $table->string('logo',100)->nullable();

            $table->unsignedInteger('empresario_id');
            $table->foreign('empresario_id','fk_empresario_empresa')
                        ->references('id')->on('empresarios');

            $table->unsignedInteger('categoria_id');
            $table->foreign('categoria_id','fk_categoria_empresa')
                        ->references('id')->on('categorias');

            $table->unsignedInteger('pais_id');
            $table->foreign('pais_id','fk_pais_empresa')
                        ->references('id')->on('pais');

            $table->unsignedInteger('ciudad_id');
            $table->foreign('ciudad_id','fk_ciudad_empresa')
                        ->references('id')->on('ciudads');
            
            $table->unsignedInteger('zona_id');
            $table->foreign('zona_id','fk_zona_empresa')
                        ->references('id')->on('zonas');

            
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
        Schema::dropIfExists('empresas');
    }
}
