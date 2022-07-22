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
        Schema::create('tokos', function (Blueprint $table) {
            $table->id('id_toko');
            $table->string('id_kategori_toko');
           
           
            $table->string('nama_toko');
            $table->longText('desc_toko')->nullable();
            $table->string('alamat');
            $table->string('pemilik');
            $table->string('password');
            $table->string('foto')->default('default/noimg.png');
            $table->string('id_banner')->nullable();

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
        Schema::dropIfExists('tokos');
    }
};
