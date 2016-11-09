<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddCreateActividadesEconomicasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('actividadesEconomicas', function (Blueprint $table) {

            $table->increments('id');
            $table->integer('anio');
            $table->string('descripcion',50);
            $table->integer('valor');
            $table->enum('tipo', ['pasivo','activo']);

            $table->integer('idPatrimonio')->unsigned();
            $table->foreign('idPatrimonio')->references('id')->on('patrimonios')->onDelete('cascade');
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
        Schema::dropIfExists('actividadesEconomicas');
    }
}
