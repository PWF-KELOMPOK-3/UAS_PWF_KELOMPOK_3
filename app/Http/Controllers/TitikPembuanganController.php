<?php
namespace App\Http\Controllers;

use App\Models\TitikPembuangan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;


class TitikPembuanganController extends Controller
{
    // Menampilkan daftar titik pembuangan untuk admin
    public function adminIndex()
    {
        $titikPembuangans = TitikPembuangan::all();
        return view('Admin_Titik_Index', compact('titikPembuangans'));
    }

    // Menampilkan daftar titik pembuangan untuk pengguna biasa
    public function index()
    {
        $titikPembuangans = TitikPembuangan::all();
        return view('Titik', compact('titikPembuangans'));
    }

    // Menampilkan form untuk menambah titik pembuangan baru
    public function create()
    {
        return view('Admin_Titik_Create');
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
            TitikPembuangan::create([
                'alamat' => $request->alamat,
                'url' => $url,
            ]);

            return redirect()->route('titik_pembuangan.index')->with('success', 'Data berhasil disimpan!');
        } catch (\Exception $e) {
            Log::error('Terjadi kesalahan saat menyimpan data: ', ['error' => $e->getMessage()]);
            return back()->withErrors('Terjadi kesalahan saat menyimpan data.');
        }
    }


    // Menampilkan form untuk mengedit titik pembuangan
    public function edit($id)
    {
        $titikPembuangan = TitikPembuangan::findOrFail($id);
        return view('Admin_Titik_Edit', compact('titikPembuangan'));
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
            return redirect()->route('titik_pembuangan.index')->with('success', 'Data berhasil diperbarui!');
        } catch (\Exception $e) {
            Log::error('Terjadi kesalahan saat memperbarui data: ', ['error' => $e->getMessage()]);
            return back()->withErrors('Terjadi kesalahan saat memperbarui data.');
        }
    }

    // Menghapus titik pembuangan
    public function destroy($id)
    {
        $titikPembuangan = TitikPembuangan::findOrFail($id);
        $titikPembuangan->delete();
        return redirect()->route('titik_pembuangan.index');
    }
}