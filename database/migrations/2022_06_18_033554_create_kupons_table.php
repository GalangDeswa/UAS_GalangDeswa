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
        Schema::create('kupons', function (Blueprint $table) {
            $table->id('id_kupon');
            $table->string('id_toko')->nullable();
            $table->string('nama_kupon')->nullable();
            $table->string('potongan')->nullable();
            $table->string('foto_kupon')->default('default/noimg.png');
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
        Schema::dropIfExists('kupons');
    }
};
