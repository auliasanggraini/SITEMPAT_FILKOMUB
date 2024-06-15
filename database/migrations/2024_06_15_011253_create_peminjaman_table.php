<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePeminjamanTable extends Migration
{
    public function up()
    {
        Schema::create('peminjaman', function (Blueprint $table) {
            $table->id();
            $table->string('Penanggung Jawab');
            $table->string('NIM');
            $table->string('Program Studi');
            $table->date('Tanggal Peminjaman');
            $table->time('Waktu Peminjaman');
            $table->integer('Durasi Peminjaman');
            $table->string('Ruangan');
            $table->text('Keperluan Peminjaman');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('peminjaman');
    }
}
