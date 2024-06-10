<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use Inertia\Response;

class RegisterController extends Controller
{
    public function index(): Response
    {
        return Inertia::render('Register/Index');
    }
}