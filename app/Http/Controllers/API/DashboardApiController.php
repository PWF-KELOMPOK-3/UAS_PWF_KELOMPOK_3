<?php

namespace App\Http\Controllers\API;

use App\Models\Artikel;
use App\Models\TitikPembuangan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardAPIController extends Controller
{
    public function index()
    {
        // Count the number of articles and TitikPembuangan
        $artikelCount = Artikel::count();
        $titikCount = TitikPembuangan::count();
        
        // Return the counts as a JSON response
        return response()->json([
            'success' => true,
            'data' => [
                'artikel_count' => $artikelCount,
                'titik_count' => $titikCount,
            ]
        ], 200);
    }
}
