<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLaporansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('laporans', function (Blueprint $table) {
            $table->id();
            $table->string('nama_barang_keluar');
            $table->date('tanggal_keluar');
            $table->integer('pemasukan');
            $table->unsignedBigInteger('pembayaran_id');;
            $table->foreign('pembayaran_id')
            ->references('id')
            ->on('pembayarans')->onUpdate('cascade')
            ->onDelete('cascade');
            $table->string('status');
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
        Schema::dropIfExists('laporans');
    }
}
