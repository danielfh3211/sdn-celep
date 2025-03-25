<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    use HasFactory;

    protected $table = 'siswa'; 

    protected $fillable = [
        'username', // Relasi ke tabel users
        'nama_siswa',
        'nama_kelas', // Relasi ke tabel kelas
        'jenis_kelamin', // Laki-laki (L) atau Perempuan (P)
    ];

    protected static function booted()
    {
        static::addGlobalScope('orderByUsername', function ($query) {
            $query->orderBy('username', 'asc'); // Urutkan berdasarkan username secara ascending
        });
    }

    /**
     * Relasi ke tabel users untuk mengambil NIS dan nama siswa.
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'username');
    }

    /**
     * Relasi ke tabel kelas untuk mengambil nama kelas.
     */
    public function kelas()
    {
        return $this->belongsTo(Kelas::class, 'nama_kelas');
    }

    public function nilai()
    {
        return $this->hasMany(Nilai::class, 'siswa_id');
    }
}
