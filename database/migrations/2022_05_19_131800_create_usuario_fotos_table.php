<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsuarioFotosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('usuario_fotos', function (Blueprint $table) {

            $table->id();
            $table->unsignedBigInteger('usuario_id');
            $table->string('foto_caminho');
            $table->timestamps();

            //foreign key (constraints) um para um
            $table->foreign('usuario_id')->references('id')->on('usuarios');
            $table->unique('usuario_id'); // botei esse paramentro para os valores na tabela  usuario foto nao se repetir

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('usuario_fotos');
    }
}
