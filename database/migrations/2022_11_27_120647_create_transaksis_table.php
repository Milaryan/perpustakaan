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
        Schema::create('transaksi', function (Blueprint $table) {
            $table->id('id_transaksi');
            $table->string('kode_transaksi');
            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id')->references('id_user')->on('users')->onDelete('cascade');
            $table->unsignedBigInteger('buku_id')->nullable();
            $table->foreign('buku_id')->references('id_buku')->on('buku')->onDelete('cascade');
            $table->string('tgl_pinjam',15);
            $table->string('bts_kembali',15);
            $table->string('tgl_kembali',15);
            $table->integer('denda')->nullable();
            $table->enum('status',['Pending','Pinjam','Kembali']);
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
        Schema::dropIfExists('transaksi');
    }
};
