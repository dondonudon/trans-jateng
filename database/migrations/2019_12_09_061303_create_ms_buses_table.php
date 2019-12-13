<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMsBusesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ms_bus', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('id_koridor');
            $table->string('nama',50);
            $table->string('merk',25);
            $table->string('no_pol',12);
            $table->string('longitude',25);
            $table->string('latitude',25);
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
        Schema::dropIfExists('ms_buses');
    }
}
