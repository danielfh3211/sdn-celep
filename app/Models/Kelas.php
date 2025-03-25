<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    use HasFactory;

    protected $fillable = ['nama_kelas'];

    protected static function booted()
    {
        static::addGlobalScope('order', function ($query) {
            $query->orderBy('nama_kelas', 'asc'); // Urutkan berdasarkan nama_kelas secara ascending
        });
    }

    public function siswa()
    {
        return $this->hasMany(User::class, 'nama_kelas'); // Relasi ke tabel siswa
    }
}