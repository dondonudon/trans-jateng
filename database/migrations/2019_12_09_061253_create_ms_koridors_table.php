<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMsKoridorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ms_koridor', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('koridor',25);
            $table->string('rute',100);
            $table->string('trip_a',50);
            $table->string('trip_b',50);
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
        Schema::dropIfExists('ms_koridors');
    }
}
