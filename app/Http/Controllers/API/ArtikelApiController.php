<?php

namespace App\Http\Controllers\API;

use App\Models\Artikel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class ArtikelAPIController extends Controller
{
    // Menampilkan semua artikel
    public function index()
    {
        $artikels = Artikel::all();
        return response()->json([
            'success' => true,
            'data' => $artikels,
        ], 200);
    }

    // Menampilkan artikel berdasarkan ID
    public function show($id)
    {
        $artikel = Artikel::find($id);

        if ($artikel) {
            return response()->json([
                'success' => true,
                'data' => $artikel,
            ], 200);
        }

        return response()->json([
            'success' => false,
            'message' => 'Artikel not found',
        ], 404);
    }

    // Menyimpan artikel baru
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'judul' => 'required|string|max:255',
            'konten' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // Menyimpan gambar jika ada
        $imagePath = null;
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            // Pindahkan gambar ke direktori public/assets/foto_artikel
            $image->move(public_path('assets/foto_artikel'), $imageName);

            $imagePath = 'assets/foto_artikel/' . $imageName;
        }

        // Menyimpan artikel ke database    
        $artikel = Artikel::create([
            'judul' => $request->judul,
            'konten' => $request->konten,
            'image_url' => $imagePath,
        ]);

        return response()->json([
            'success' => true,
            'data' => $artikel,
            'message' => 'Artikel created successfully.',
        ], 201);
    }

    // Memperbarui artikel yang ada
    public function update(Request $request, $id)
    {
        // Validasi input
        $request->validate([
            'judul' => 'required|string|max:255',
            'konten' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $artikel = Artikel::find($id);

        if (!$artikel) {
            return response()->json([
                'success' => false,
                'message' => 'Artikel not found',
            ], 404);
        }

        if ($request->hasFile('image')) {
            // Hapus gambar lama jika ada
            if ($artikel->image_url) {
                Storage::delete('public/' . $artikel->image_url);
            }

            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            // Pindahkan gambar ke direktori public/assets/foto_artikel
            $image->move(public_path('assets/foto_artikel'), $imageName);

            $imagePath = 'assets/foto_artikel/' . $imageName;
            $artikel->image_url = $imagePath;
        }

        // Update artikel dengan data baru
        $artikel->update([
            'judul' => $request->judul,
            'konten' => $request->konten,
        ]);

        return response()->json([
            'success' => true,
            'data' => $artikel,
            'message' => 'Artikel updated successfully.',
        ], 200);
    }

    // Menghapus artikel
    public function destroy($id)
    {
        $artikel = Artikel::find($id);

        if (!$artikel) {
            return response()->json([
                'success' => false,
                'message' => 'Artikel not found',
            ], 404);
        }

        // Hapus gambar jika ada
        if ($artikel->image_url) {
            Storage::delete('public/' . $artikel->image_url);
        }

        $artikel->delete();

        return response()->json([
            'success' => true,
            'message' => 'Artikel deleted successfully.',
        ], 200);
    }
}
