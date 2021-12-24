<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKeranjangsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('keranjangs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_users')->constrained('users')->onDelete('cascade')->onUpdate('cascade');
            $table->integer('jumlah_barang');
            $table->integer('harga_total');
            $table->date('tanggal');
            $table->integer('status');
            $table->timestamps();

            //ada 2 status, yaitu status 0 & 1
            //status 0 belum bayar
            //status 1 sudah bayar
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('keranjangs');
    }
}
