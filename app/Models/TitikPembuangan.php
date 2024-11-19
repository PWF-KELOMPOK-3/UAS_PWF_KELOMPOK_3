<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TitikPembuangan extends Model
{
    use HasFactory;

    protected $fillable = ['alamat', 'url'];

    public $timestamps = true;
}
