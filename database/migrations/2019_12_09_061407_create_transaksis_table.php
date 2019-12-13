<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransaksisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaksi', function (Blueprint $table) {
            $table->string('no_transaksi',20);
            $table->date('tgl_transaksi');
            $table->time('jam_transaksi');
            $table->integer('id_penumpang');
            $table->integer('id_bus');
            $table->string('opsi_bayar',20);
            $table->decimal('harga',6,2);
            $table->string('username');
            $table->integer('shift');
            $table->integer('id_koridor');
            $table->string('trip',5);
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
        Schema::dropIfExists('transaksis');
    }
}
