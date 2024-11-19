<?php

namespace App\Http\Controllers;

use App\Models\Artikel; // Pastikan model Artikel sudah ada dan sesuai
use App\Models\TitikPembuangan; // Jika ada model ini, tambahkan juga
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $artikelCount = Artikel::count();
        $titikCount = TitikPembuangan::count();
        
        return view('Admin_Dashboard', compact('artikelCount', 'titikCount'));
    }
}

