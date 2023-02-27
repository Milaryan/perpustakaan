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
        Schema::create('buku', function (Blueprint $table) {
            $table->id('id_buku');
            $table->string('sampul')->nullable();
            $table->string('judul',50);
            $table->string('pengarang',50)->nullable()->default('-');
            $table->string('penerbit',50)->nullable()->default('-');
            $table->integer('thn_terbit');
            $table->text('sinopsis')->nullable();
            $table->integer('stok');
            $table->string('pdf_file')->nullable();
            $table->unsignedBigInteger('kategori_id')->nullable();
            $table->foreign('kategori_id')->references('id_kategori')->on('kategori')->onDelete('cascade');
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
        Schema::dropIfExists('buku');
    }
};
