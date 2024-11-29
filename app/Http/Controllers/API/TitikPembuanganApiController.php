<?php

namespace App\Http\Controllers\API;

use App\Models\TitikPembuangan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Log;

class TitikPembuanganAPIController extends Controller
{
    // Menampilkan daftar titik pembuangan untuk admin
    public function adminIndex()
    {
        try {
            $titikPembuangans = TitikPembuangan::all();
            return response()->json([
                'success' => true,
                'data' => $titikPembuangans
            ], 200);
        } catch (\Exception $e) {
            Log::error('Error fetching titik pembuangan: ', ['error' => $e->getMessage()]);
            return response()->json([
                'success' => false,
                'message' => 'Terjadi kesalahan saat mengambil data.'
            ], 500);
        }
    }

    // Menampilkan daftar titik pembuangan untuk pengguna biasa
    public function index()
    {
        try {
            $titikPembuangans = TitikPembuangan::all();
            return response()->json([
                'success' => true,
                'data' => $titikPembuangans
            ], 200);
        } catch (\Exception $e) {
            Log::error('Error fetching titik pembuangan for user: ', ['error' => $e->getMessage()]);
            return response()->json([
                'success' => false,
                'message' => 'Terjadi kesalahan saat mengambil data.'
            ], 500);
        }
    }

    // Menyimpan titik pembuangan baru ke database
    public function store(Request $request)
    {
        $request->validate([
            'alamat' => 'required|string|max:255',
            'url' => 'required|string',
        ]);

        try {
            $url = $request->url;

            // Cek dan ubah atribut width dan height
            $url = preg_replace('/width="\d+"/', 'width="545"', $url); // Ganti width jadi 545
            $url = preg_replace('/height="\d+"/', 'height="300"', $url); // Ganti height jadi 300

            // Simpan ke database
            $titikPembuangan = TitikPembuangan::create([
                'alamat' => $request->alamat,
                'url' => $url,
            ]);

            return response()->json([
                'success' => true,
                'data' => $titikPembuangan,
                'message' => 'Data berhasil disimpan!'
            ], 201);
        } catch (\Exception $e) {
            Log::error('Error saving titik pembuangan: ', ['error' => $e->getMessage()]);
            return response()->json([
                'success' => false,
                'message' => 'Terjadi kesalahan saat menyimpan data.'
            ], 500);
        }
    }

    // Mengupdate data titik pembuangan
    public function update(Request $request, $id)
    {
        $request->validate([
            'alamat' => 'required|string|max:255',
            'url' => 'required|string',
        ]);

        try {
            $titikPembuangan = TitikPembuangan::findOrFail($id);
            $titikPembuangan->update([
                'alamat' => $request->alamat,
                'url' => $request->url,
            ]);

            return response()->json([
                'success' => true,
                'data' => $titikPembuangan,
                'message' => 'Data berhasil diperbarui!'
            ], 200);
        } catch (\Exception $e) {
            Log::error('Error updating titik pembuangan: ', ['error' => $e->getMessage()]);
            return response()->json([
                'success' => false,
                'message' => 'Terjadi kesalahan saat memperbarui data.'
            ], 500);
        }
    }

    // Menghapus titik pembuangan
    public function destroy($id)
    {
        try {
            $titikPembuangan = TitikPembuangan::findOrFail($id);
            $titikPembuangan->delete();

            return response()->json([
                'success' => true,
                'message' => 'Data berhasil dihapus!'
            ], 200);
        } catch (\Exception $e) {
            Log::error('Error deleting titik pembuangan: ', ['error' => $e->getMessage()]);
            return response()->json([
                'success' => false,
                'message' => 'Terjadi kesalahan saat menghapus data.'
            ], 500);
        }
    }
}
