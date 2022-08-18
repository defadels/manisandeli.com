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
            $table->string('nama_bank');
            $table->string('nama_pemilik')->nullable();
            $table->string('nomor_rekening')->nullable();
            $table->string('nomor_hp')->nullable();
            $table->string('deskripsi')->nullable();
            $table->enum('jenis', ['COD','Cash', 'Bank', 'E-Wallet', 'Custom']);
            $table->enum('status', ['Aktif','Nonaktif'])->default('Aktif');
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
