<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDatosPdfTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('datos_pdf', function (Blueprint $table) {
            $table->id();
            $table->foreignId('cabildo_id')->nullable()->constrained('cabildo_abierto');
            $table->string('radicado');
            $table->string('ciudadano');
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
        Schema::dropIfExists('datos_pdf');
    }
}
