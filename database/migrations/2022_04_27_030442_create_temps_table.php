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
        Schema::create('temps', function (Blueprint $table) {
            $table->id('id_temp');
            $table->string('id_user')->nullable();
            $table->string('id_toko')->nullable();
            $table->string('id_barang')->nullable();
            $table->string('id_kupon')->nullable();
            $table->string('id_kurir')->nullable();
            $table->string('harga')->nullable();
            $table->string('diskon')->nullable();
            $table->string('no_bukti')->nullable();
            $table->string('qty')->nullable();
            $table->string('subtotal')->nullable();
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
        Schema::dropIfExists('temps');
    }
};
