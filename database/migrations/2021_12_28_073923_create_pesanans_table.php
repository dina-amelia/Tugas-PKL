<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePesanansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pesanans', function (Blueprint $table) {
            $table->id();
            $table->string('pemesan');
            $table->string('alamat');
            $table->integer('no_telephone');
            $table->integer('jumlah');
            $table->unsignedBigInteger('barang_id');
            $table->foreign('barang_id')
                ->references('id')
                ->on('barangs')->onUpdate('cascade')
                ->onDelete('cascade');
            $table->date('tanggal_pesan');
            $table->integer('harga');
            $table->integer('total');
            $table->integer('uang');
            $table->integer('kembalian');
            $table->date('tanggal_bayar');
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
        Schema::dropIfExists('pesanans');
    }
}
