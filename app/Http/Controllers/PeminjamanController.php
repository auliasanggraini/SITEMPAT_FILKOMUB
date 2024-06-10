<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Peminjaman;

class PeminjamanController extends Controller
{
    public function index()
    {
        return Peminjaman::with('ruangan', 'user')->get();
    }

    public function store(Request $request)
    {
        return Peminjaman::create($request->all());
    }

    public function show($id)
    {
        return Peminjaman::with('ruangan', 'user')->find($id);
    }

    public function update(Request $request, $id)
    {
        $peminjaman = Peminjaman::find($id);
        $peminjaman->update($request->all());
        return $peminjaman;
    }

    public function destroy($id)
    {
        return Peminjaman::destroy($id);
    }
}

