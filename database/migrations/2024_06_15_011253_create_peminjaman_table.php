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
            $table->string('penanggung_jawab');
            $table->string('nim');
            $table->string('program_studi');
            $table->date('tanggal_peminjaman');
            $table->time('waktu_peminjaman');
            $table->integer('durasi_peminjaman');
            $table->string('ruangan');
            $table->text('keperluan_peminjaman');
            $table->enum('status', ['Pending', 'Booking', 'Selesai'])->default('Pending');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('peminjaman');
    }
}
