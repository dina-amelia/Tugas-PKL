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
            $table->foreignId('id_barang')
            ->constraint('barangs')
            ->onUpdate('cascade')
            ->onDelete('cascade');
            $table->string('harga');
            $table->foreignId('id_user')
            ->constraint('users')
            ->onUpdate('cascade')
            ->onDelete('cascade');
            $table->date('tanggal_pesan');

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
