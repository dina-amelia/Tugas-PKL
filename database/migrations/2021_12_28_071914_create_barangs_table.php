<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBarangsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('barangs', function (Blueprint $table) {
            $table->id();
            $table->string('kode_barang');
            $table->unsignedBigInteger('barang_id');
            $table->foreign('barang_id')
                ->references('id')
                ->on('barangmasuks')->onUpdate('cascade')
                ->onDelete('cascade');
            $table->integer('stock');
            $table->string('harga');
            $table->string('kategori');
            $table->string('deskripsi');
            $table->string('gambar')->nullable;

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
}
