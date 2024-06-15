<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Peminjaman;

class PeminjamanController extends Controller
{
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'penanggungJawab' => 'required|string|max:255',
            'nim' => 'required|string|max:255',
            'programStudi' => 'required|string|max:255',
            'tanggalPeminjaman' => 'required|date',
            'waktuPeminjaman' => 'required|date_format:H:i',
            'durasiPeminjaman' => 'required|integer|min:1',
            'room' => 'required|string|max:255',
            'keperluan' => 'required|string'
        ]);

        $peminjaman = Peminjaman::create($validatedData);

        return response()->json($peminjaman, 201);
    }
}
