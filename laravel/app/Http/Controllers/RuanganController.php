<?php

namespace App\Http\Controllers;

use App\Models\Ruangan;
use Illuminate\Http\Request;

class RuanganController extends Controller
{
    public function index()
    {
        return Ruangan::all();
    }

    public function store(Request $request)
    {
        return Ruangan::create($request->all());
    }

    public function show($id)
    {
        return Ruangan::find($id);
    }

    public function update(Request $request, $id)
    {
        $ruangan = Ruangan::find($id);
        $ruangan->update($request->all());
        return $ruangan;
    }

    public function destroy($id)
    {
        return Ruangan::destroy($id);
    }
}
