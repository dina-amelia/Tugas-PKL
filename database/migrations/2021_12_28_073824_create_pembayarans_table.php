<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePembayaransTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pembayarans', function (Blueprint $table) {
            $table->id();
            $table->string('nama_barang');
            $table->integer('no_telephone');
            $table->integer('qty');
            $table->foreignId('id_pesanan')
            ->constraint('pesanans')
            ->onUpdate('cascade')
            ->onDelete('cascade');
            $table->date('tanggal_bayar');
            $table->integer('total');

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
        Schema::dropIfExists('pembayarans');
    }
}
