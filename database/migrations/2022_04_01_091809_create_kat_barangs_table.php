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
        Schema::create('kat_barangs', function (Blueprint $table) {
            $table->id('id_kat_barang');
            $table->string('id_toko');
            $table->string('kategori_barang');
            $table->string('foto')->default('default/noimg.png');
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
        Schema::dropIfExists('kat_barangs');
    }
};
