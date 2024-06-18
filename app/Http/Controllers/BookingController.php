<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Peminjaman;
use Illuminate\Support\Facades\Log;
use Inertia\Inertia;

class BookingController extends Controller
{
    public function indexPage()
    {
        // Get
        $currentBookings = Peminjaman::where('status', 'Booking')->get();
        $bookingHistory = Peminjaman::where('status', 'Selesai')->get();

        return Inertia::render('Peminjaman/Index', [
            'bookingData' => $currentBookings,
            'doneData' => $bookingHistory
        ]);
    }

    public function createPage()
    {
        return Inertia::render('Peminjaman/Create');
    }

    public function store(Request $request)
    {
        // API Create
        Log::info('Menerima permintaan penyimpanan peminjaman', $request->all());

        // Validasi input
        $request->validate([
            'penanggungJawab' => 'required|string',
            'nim' => 'required|string',
            'programStudi' => 'required|string',
            'tanggalPeminjaman' => 'required|date',
            'waktuPeminjaman' => 'required|date_format:H:i',
            'durasiPeminjaman' => 'required|integer|min:1',
            'ruangan' => 'required|string',
            'keperluanPeminjaman' => 'required|string',
        ]);

        // Konversi waktu mulai dan waktu selesai
        $waktu_mulai = $request->tanggalPeminjaman . ' ' . $request->waktuPeminjaman;
        $waktu_selesai = date('Y-m-d H:i', strtotime($waktu_mulai . ' + ' . $request->durasiPeminjaman . ' hours'));

        // Simpan data peminjaman ke database
        $peminjaman = Peminjaman::create([
            'penanggung_jawab' => $request->penanggungJawab,
            'nim' => $request->nim,
            'program_studi' => $request->programStudi,
            'tanggal_peminjaman' => $request->tanggalPeminjaman,
            'waktu_peminjaman' => $request->waktuPeminjaman,
            'durasi_peminjaman' => $request->durasiPeminjaman,
            'ruangan' => $request->ruangan,
            'keperluan_peminjaman' => $request->keperluanPeminjaman,
            'status' => 'Booking',
            // 'waktu_mulai' => $waktu_mulai,
            // 'waktu_selesai' => $waktu_selesai, // ngga kepakai
            // 'user_id' => 1, // Sesuaikan dengan user_id sebenarnya (ini dummy dulu) belum terpakai
        ]);

        Log::info('Peminjaman berhasil disimpan', ['id' => $peminjaman->id]);

        return response()->json(['message' => 'Peminjaman berhasil disimpan'], 201);
    }

    public function update(Request $request)
    {
        // API Update
        $request->validate([
            'peminjaman_id' => 'required|exists:peminjaman,id', // pastikkan mengirim id yang akan di update
            'penanggungJawab' => 'required|string',
            'nim' => 'required|string',
            'programStudi' => 'required|string',
            'tanggalPeminjaman' => 'required|date',
            'waktuPeminjaman' => 'required|date_format:H:i',
            'durasiPeminjaman' => 'required|integer|min:1',
            'ruangan' => 'required|string',
            'keperluanPeminjaman' => 'required|string',
        ]);

        $peminjaman = Peminjaman::findOrFail($request->peminjaman_id); // get data peminjaman yang akan di update
        $peminjaman->update([
            'penanggung_jawab' => $request->penanggungJawab,
            'nim' => $request->nim,
            'program_studi' => $request->programStudi,
            'tanggal_peminjaman' => $request->tanggalPeminjaman,
            'waktu_peminjaman' => $request->waktuPeminjaman,
            'durasi_peminjaman' => $request->durasiPeminjaman,
            'ruangan' => $request->ruangan,
            'keperluan_peminjaman' => $request->keperluanPeminjaman,
            'status' => 'Booking',
        ]);

        return response()->json(['message' => 'Peminjaman berhasil di update'], 201);
    }

    public function delete(Request $request)
    {
        // API Delete
        $request->validate([
            'peminjaman_id' => 'required|exists:peminjaman,id', // pastikkan mengirim id yang akan di update
        ]);

        $peminjaman = Peminjaman::findOrFail($request->peminjaman_id); // get data peminjaman yang akan di update
        $peminjaman->delete();

        return response()->json(['message' => 'Peminjaman berhasil di hapus'], 201);
    }
}
