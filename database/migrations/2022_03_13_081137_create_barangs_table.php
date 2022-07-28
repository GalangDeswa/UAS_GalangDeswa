<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('barangs', function (Blueprint $table) {
            $table->id('id_barang');
            $table->string('nama_barang');
            $table->string('kondisi');
            $table->string('id_toko');
            $table->string('id_kategori_barang');
            $table->string('harga_diskon')->nullable();
            $table->string('harga');
            $table->dateTime('waktu');
            $table->string('qty_barang');
            $table->string('desc_barang')->nullable();
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
        Schema::dropIfExists('barangs');
    }
};
