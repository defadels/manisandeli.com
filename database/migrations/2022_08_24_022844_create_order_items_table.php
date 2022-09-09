<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('pelanggan_id')->unsigned();
            $table->foreign('pelanggan_id')->references('id')->on('users')->onDelete('cascade');
            // $table->bigInteger('alamat_id')->unsigned();
            // $table->foreign('alamat_id')->references('id')->on('alamat')->onDelete('cascade');
            // $table->string('kota');
            // $table->string('provinsi');
            // $table->string('kode_pos');
            $table->string('subtotal');
            $table->string('total');
            $table->string('diskon');
            $table->string('ongkir');
            $table->string('invoice');
            $table->string('nama_lengkap');
            $table->string('email');
            $table->string('nomor_hp');
            $table->enum('status',['masuk','diproses','dikirim','batal','diantar','selesai'])->default('masuk');
            $table->boolean('pengiriman_berbeda')->default(false);
            $table->timestamps();
        });

        Schema::create('order_item', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->foreignId('orderan_id')->constrained('order')->onDelete('cascade');
            $table->foreignId('produk_id')->constrained('produk')->onDelete('cascade');
            $table->integer('jumlah');
            $table->decimal('harga');
            $table->timestamps();
        });

        Schema::create('transaksi', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->foreignId('orderan_id')->constrained('order')->onDelete('cascade');
            $table->foreignId('pelanggan_id')->constrained('users')->onDelete('cascade');
            // $table->foreignId('pembayaran_pelanggan_id')->constrained('metode_pembayaran_pelanggan')->onDelete('cascade');
            $table->string('invoice');
            $table->string('nama_bank')->nullable();
            $table->string('nama_pemilik')->nullable();
            $table->string('nomor_rekening')->nullable();
            $table->string('bank_tujuan')->nullable();
            $table->string('pemilik_rekening_tujuan')->nullable();
            $table->string('rekening_tujuan')->nullable();
            $table->string('foto_bukti_tf');  
            $table->enum('metode_pembayaran', ['COD','Bayar di Toko', 'Transfer']);
            $table->enum('status', ['Disetujui', 'Ditunda', 'Dikembalikan', 'Ditolak'])->default('Ditunda');
            $table->timestamps();
        });

        Schema::create('pengiriman', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->foreignId('orderan_id')->constrained('order')->onDelete('cascade');
            $table->foreignId('alamat_id')->nullable()->constrained('alamat')->onDelete('set null');
            $table->string('invoice');
            $table->string('nama_lengkap');
            $table->string('label');
            $table->string('alamat_lengkap');
            $table->string('kota');
            $table->string('provinsi');
            $table->string('kode_pos');
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
        Schema::dropIfExists('order');
        Schema::dropIfExists('order_item');
        Schema::dropIfExists('transaksi');
        Schema::dropIfExists('pengiriman');
    }
}
