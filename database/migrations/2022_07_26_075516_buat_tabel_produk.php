<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class BuatTabelProduk extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('produk', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nama')->nullable();
            $table->string('kode_produk')->nullable();
            $table->string('foto_produk')->nullable();
            $table->text('konten')->nullable();
            $table->string('deskripsi')->nullable();
            $table->integer('harga_pokok')->nullable();
            $table->integer('harga_jual')->nullable();
            $table->enum('status', ['aktif','nonaktif'])->default('aktif');
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
        Schema::dropIfExists('produk');
    }
}
