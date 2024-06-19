<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;

class ProfileController extends Controller
{
    // public function index(): Response
    // {
    //     return Inertia::render('Profile/Index');
    // }
    
    public function show(Request $request)
    {
        return $request->user(); // Mengembalikan data user saat ini
    }

    public function update(Request $request)
    {
        $user = $request->user();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->nim = $request->nim;
        $user->program = $request->program;
        $user->phone = $request->phone;
        $user->save();

        return response()->json(['message' => 'Profile updated successfully', 'user' => $user]);
    }
}