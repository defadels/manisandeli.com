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
            $table->string('nama_pemilik')->nullable();
            $table->string('nomor_rekening')->nullable();
            $table->string('deskripsi')->nullable();
            $table->enum('jenis', ['COD','Cash', 'Bank', 'E-Wallet', 'Custom']);
            $table->enum('status', ['Aktif','Nonaktif'])->default('Aktif')->default('Aktif');
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
