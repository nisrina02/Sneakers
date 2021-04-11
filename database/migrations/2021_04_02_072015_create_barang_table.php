<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBarangTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('barang', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->String('nama_barang');
            $table->String('foto');
            $table->String('jenis');
            $table->text('deskripsi');
            $table->unsignedBigInteger('harga');
            $table->unsignedBigInteger('stok');
            $table->unsignedBigInteger('id_merchant');
            $table->timestamps();

            // $table->foreign('id_merchant')->references('id')->on('merchant');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('barang');
    }
}
