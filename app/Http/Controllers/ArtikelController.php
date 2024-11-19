<?php

namespace App\Http\Controllers;

use App\Models\Artikel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ArtikelController extends Controller
{  
    public function index()
    {
        $artikels = Artikel::all();
        return view('Artikel', compact('artikels'));
    }
    
    // Menampilkan semua artikel untuk Admin
    public function adminIndex()
    {
        $artikels = Artikel::all();
        return view('Admin_Artikel_Index', compact('artikels'));
    }

    // Menampilkan semua artikel untuk user
  

    // Menampilkan form untuk membuat artikel baru
    public function create()
    {
        return view('Admin_Artikel_Create');
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
        Artikel::create([
            'judul' => $request->judul,
            'konten' => $request->konten,
            'image_url' => $imagePath,
        ]);

        return redirect()->route('artikel.admin');
    }

    // Menampilkan form untuk mengedit artikel
    public function edit($id)
    {
        $artikel = Artikel::findOrFail($id);
        return view('Admin_Artikel_Edit', compact('artikel'));
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

        $artikel = Artikel::findOrFail($id);

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

        return redirect()->route('artikel.admin');
    }

    // Menghapus artikel
    public function destroy($id)
    {
        $artikel = Artikel::findOrFail($id);

        // Hapus gambar jika ada
        if ($artikel->image_url) {
            Storage::delete('public/' . $artikel->image_url);
        }

        $artikel->delete();

        return redirect()->route('artikel.admin');
    }
}
