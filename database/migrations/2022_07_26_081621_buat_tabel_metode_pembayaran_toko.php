<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class BuatTabelMetodePembayaranToko extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('metode_pembayaran_toko', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nama');
            $table->string('nomor_rekening');
            $table->string('nomor_hp');
            $table->string('deskripsi');
            $table->enum('jenis', ['COD','Cash', 'Bank', 'E-Wallet', 'Custom']);
            $table->enum('status', ['Aktif','Nonaktif']);
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
        Schema::dropIfExists('metode_pembayaran_toko');
    }
}
