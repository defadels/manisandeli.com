<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class BuatTabelMetodePembayaranPelanggan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('metode_pembayaran_pelanggan', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->foreignId('pelanggan_id')->constrained('users');
            $table->string('nama');
            $table->string('deskirpsi');
            $table->string('no_rekening');
            $table->string('nomor_hp');
            $table->enum('jenis', ['COD', 'Cash', 'Bank', 'E-Wallet', 'Custom']);
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
        Schema::dropIfExists('metode_pembayaran_pelanggan');
    }
}
