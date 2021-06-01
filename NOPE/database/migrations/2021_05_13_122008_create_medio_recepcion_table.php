<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMedioRecepcionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('centralizado')->create('medio_recepcion', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('integer');
            $table->integer('idAsesorRegistra');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::connection('centralizado')->dropIfExists('medio_recepcion');
    }
}
