<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MataPelajaran extends Model
{
    use HasFactory;

    protected $fillable = ['nama_mapel'];

    public function nilai()
    {
        return $this->hasMany(Nilai::class, 'mapel_id'); // Relasi ke tabel siswa
    }
}
