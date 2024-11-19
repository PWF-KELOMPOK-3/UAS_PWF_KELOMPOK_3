<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Artikel extends Model
{
    use HasFactory;

    // Jika nama tabel memang 'artikels', pastikan menambahkan properti ini
    protected $table = 'artikels';  // Tentukan nama tabel secara eksplisit jika diperlukan

    protected $fillable = ['judul', 'konten', 'image_url'];
}

