<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddCreateReunionesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reuniones', function (Blueprint $table) {

            $table->increments('id');
            $table->timestamps();
            $table->string('descripcion',100);
            $table->integer('cantidadAsistentes');
            $table->integer('cantidadDecisiones');

            $table->integer('idEmpresa')->unsigned();
            $table->foreign('idEmpresa')->references('id')->on('organizaciones')->onDelete('cascade');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reuniones');
    }
}
