<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Peminjaman;
use Illuminate\Support\Facades\Log;

class BookingController extends Controller
{
    public function store(Request $request)
    {
        Log::info('Menerima permintaan penyimpanan peminjaman', $request->all());

        // Validasi input
        $request->validate([
            'penanggungJawab' => 'required|string',
            'nim' => 'required|string',
            'programStudi' => 'required|string',
            'tanggalPeminjaman' => 'required|date',
            'waktuPeminjaman' => 'required|date_format:H:i',
            'durasiPeminjaman' => 'required|integer|min:1',
            'room' => 'required|string',
            'keperluan' => 'required|string',
        ]);

        // Konversi waktu mulai dan waktu selesai
        $waktu_mulai = $request->tanggalPeminjaman . ' ' . $request->waktuPeminjaman;
        $waktu_selesai = date('Y-m-d H:i', strtotime($waktu_mulai . ' + ' . $request->durasiPeminjaman . ' hours'));

        // Simpan data peminjaman ke database
        $peminjaman = Peminjaman::create([
            'ruangan_id' => $request->room,
            'user_id' => 1, // Sesuaikan dengan user_id sebenarnya
            'waktu_mulai' => $waktu_mulai,
            'waktu_selesai' => $waktu_selesai,
            'tujuan' => $request->keperluan,
            'status' => 'pending',
        ]);

        Log::info('Peminjaman berhasil disimpan', ['id' => $peminjaman->id]);

        return response()->json(['message' => 'Peminjaman berhasil disimpan'], 201);
    }
}
