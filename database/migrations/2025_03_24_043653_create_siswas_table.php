<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('siswa', function (Blueprint $table) {
            $table->id();
            $table->string('username')->unique(); // Relasi ke tabel users
            $table->string('nama_siswa');
            $table->string('nama_kelas'); // Relasi ke tabel kelas
            $table->enum('jenis_kelamin', ['Laki-laki', 'Perempuan']); // Laki-laki (L) atau Perempuan (P)
            $table->timestamps();

            // Foreign key constraints
            $table->foreign('username')->references('username')->on('users')->onDelete('cascade');
            $table->foreign('nama_kelas')->references('nama_kelas')->on('kelas')->onDelete('cascade');
            });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('siswa');
    }
};
