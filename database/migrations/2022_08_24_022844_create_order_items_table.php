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
            $table->id();
            $table->bigInteger('pelanggan_id')->unsigned();
            $table->foreign('pelanggan_id')->references('id')->on('users')->onDelete('cascade');
            $table->bigInteger('alamat_id')->unsigned();
            $table->foreign('alamat_id')->references('id')->on('alamat')->onDelete('cascade');
            $table->decimal('subtotal');
            $table->decimal('total');
            $table->decimal('diskon')->default(0);
            $table->decimal('ongkir');
            $table->string('invoice');
            $table->string('nama_lengkap');
            $table->string('kota');
            $table->string('provinsi');
            $table->string('kode_pos');
            $table->enum('status',['masuk','diproses','dikirim','batal','diantar','selesai'])->default('masuk');
            $table->boolean('pengiriman_berbeda')->default(false);
            $table->timestamps();
        });

        Schema::create('order_item', function (Blueprint $table) {
            $table->id();
            $table->foreignId('orderan_id')->constrained('order')->onDelete('cascade');
            $table->foreignId('produk_id')->constrained('produk')->onDelete('cascade');
            $table->integer('jumlah');
            $table->decimal('harga');
            $table->timestamps();
        });

        Schema::create('transaksi', function (Blueprint $table) {
            $table->id();
            $table->foreignId('orderan_id')->constrained('order')->onDelete('cascade');
            $table->foreignId('pelanggan_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('pembayaran_pelanggan_id')->constrained('metode_pembayaran_pelanggan')->onDelete('cascade');
            $table->string('invoice');
            $table->enum('jenis', ['COD','Bayar di Toko', 'Bank', 'E-Wallet']);
            $table->enum('status', ['Disetujui', 'Ditunda', 'Dikembalikan', 'Ditolak'])->default('Ditunda');
            $table->timestamps();
        });

        Schema::create('pengiriman', function (Blueprint $table) {
            $table->id();
            $table->foreignId('orderan_id')->constrained('order')->onDelete('cascade');
            $table->foreignId('alamat_id')->constrained('alamat')->onDelete('cascade');
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
