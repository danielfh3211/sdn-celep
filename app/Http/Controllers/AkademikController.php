<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kelas;
use App\Models\MataPelajaran;
use App\Models\User;
use App\Models\Siswa;
use App\Models\Nilai;
use Illuminate\Support\Facades\Response;
use App\Exports\NilaiExport;
use Maatwebsite\Excel\Facades\Excel;

class AkademikController extends Controller
{
    public function dataSiswa()
    {
        $siswa = Siswa::paginate(10); 
        $usedUsernames = Siswa::pluck('username')->toArray(); // Ambil username yang sudah digunakan
        $users = User::where('role', 'siswa')
            ->whereNotIn('username', $usedUsernames) // Hanya ambil username yang belum digunakan
            ->get();
        $kelas = Kelas::all(); // Ambil semua data kelas
        return view('akademik.data-siswa', compact('siswa', 'users', 'kelas'));
    }

    public function storeSiswa(Request $request)
    {
        $request->validate([
            'username' => 'required|exists:users,username|unique:siswa,username', // Validasi foreign key username
            'nama_siswa' => 'required|string|max:255',
            'nama_kelas' => 'required|exists:kelas,nama_kelas', // Validasi foreign key nama_kelas
            'jenis_kelamin' => 'required|in:Laki-laki,Perempuan',
        ]);
    
        Siswa::create([
            'username' => $request->username,
            'nama_siswa' => $request->nama_siswa,
            'nama_kelas' => $request->nama_kelas,
            'jenis_kelamin' => $request->jenis_kelamin,
        ]);

        return redirect()->route('akademik.data-siswa')->with('success', 'Data siswa berhasil ditambahkan.');
    }

    public function updateSiswa(Request $request, $id)
    {
        $request->validate([
            'username' => 'required|exists:users,username|unique:siswa,username,' . $id, // Validasi unik
            'nama_siswa' => 'required|string|max:255',
            'nama_kelas' => 'required|exists:kelas,nama_kelas', // Validasi foreign key nama_kelas
            'jenis_kelamin' => 'required|in:Laki-laki,Perempuan',
        ]);

        $siswa = Siswa::findOrFail($id);
        $siswa->update([
            'username' => $request->username,
            'nama_siswa' => $request->nama_siswa,
            'nama_kelas' => $request->nama_kelas,
            'jenis_kelamin' => $request->jenis_kelamin,
        ]);

        return redirect()->route('akademik.data-siswa')->with('success', 'Data siswa berhasil diperbarui.');
    }

    public function deleteSiswa($id)
    {
        $siswa = Siswa::findOrFail($id);
        $siswa->delete();

        return redirect()->route('akademik.data-siswa')->with('success', 'Data siswa berhasil dihapus.');
    }

    public function dataKelas()
    {
        $kelas = Kelas::paginate(10); // Ambil semua data kelas
        return view('akademik.data-kelas', compact('kelas'));
    }

    public function storeKelas(Request $request)
    {
        $request->validate([
            'nama_kelas' => 'required|unique:kelas,nama_kelas',
        ]);

        Kelas::create($request->all());
        return redirect()->route('akademik.data-kelas')->with('success', 'Kelas berhasil ditambahkan.');
    }

    public function updateKelas(Request $request, $id)
    {
        $request->validate([
            'nama_kelas' => 'required|unique:kelas,nama_kelas,' . $id,
        ]);

        $kelas = Kelas::findOrFail($id);
        $kelas->update($request->all());
        return redirect()->route('akademik.data-kelas')->with('success', 'Kelas berhasil diperbarui.');
    }

    public function deleteKelas($id)
    {
        $kelas = Kelas::findOrFail($id);
        $kelas->delete();
        return redirect()->route('akademik.data-kelas')->with('success', 'Kelas berhasil dihapus.');
    }

    public function naikKelas()
    {
        $siswa = Siswa::paginate(10); // Ambil semua siswa
        $kelas = Kelas::paginate(10); // Ambil semua kelas
        return view('akademik.naik-kelas', compact('siswa', 'kelas'));
    }

    public function naikKelasProses(Request $request)
    {
        $request->validate([
            'siswa_ids' => 'required|array', // Pastikan siswa dipilih
            'kelas_baru' => 'required|exists:kelas,nama_kelas', // Validasi kelas baru
        ]);

        // Update kelas siswa
        Siswa::whereIn('id', $request->siswa_ids)->update(['nama_kelas' => $request->kelas_baru]);

        return redirect()->route('akademik.naik-kelas')->with('success', 'Siswa berhasil dipindahkan ke kelas baru.');
    }

    public function mataPelajaran()
    {
        $mapel = MataPelajaran::paginate(10); // Menampilkan 10 data per halaman
        return view('akademik.mata-pelajaran', compact('mapel'));
    }

    public function storeMapel(Request $request)
    {
        $request->validate([
            'nama_mapel' => 'required|string|max:255',
        ]);

        MataPelajaran::create([
            'nama_mapel' => $request->nama_mapel,
        ]);

        return redirect()->route('akademik.mata-pelajaran')->with('success', 'Mata Pelajaran berhasil ditambahkan.');
    }

    public function updateMapel(Request $request, $id)
    {
        $request->validate([
            'nama_mapel' => 'required|string|max:255',
        ]);

        $mapel = MataPelajaran::findOrFail($id);
        $mapel->update([
            'nama_mapel' => $request->nama_mapel,
        ]);

        return redirect()->route('akademik.mata-pelajaran')->with('success', 'Mata Pelajaran berhasil diperbarui.');
    }

    public function deleteMapel($id)
    {
        $mapel = MataPelajaran::findOrFail($id);
        $mapel->delete();

        return redirect()->route('akademik.mata-pelajaran')->with('success', 'Mata Pelajaran berhasil dihapus.');
    }

    public function pilihSiswaInputNilai()
    {
        $siswa = Siswa::paginate(10);
        return view('akademik.pilih-siswa-input-nilai', compact('siswa'));
    }

    public function inputNilai($id)
    {
        $siswa = Siswa::findOrFail($id);
        $mapel = MataPelajaran::all();
        return view('akademik.data-nilai', compact('siswa', 'mapel'));
    }

    public function dataNilai()
    {
        $siswa = Siswa::all();
        $mapel = MataPelajaran::all();
        return view('akademik.data-nilai', compact('siswa', 'mapel'));
    }    

    public function storeNilai(Request $request)
    {
        $request->validate([
            'siswa_id' => 'required|exists:siswa,id',
            'mapel_id' => 'required|exists:mata_pelajarans,id',
            'nilai' => 'required|integer|min:0|max:100',
            'semester' => 'required|string',
            'tahun_ajaran' => 'required|string',
        ]);

        // Cek apakah nilai untuk siswa, mata pelajaran, semester, dan tahun ajaran sudah ada
        $existingNilai = Nilai::where('siswa_id', $request->siswa_id)
            ->where('mapel_id', $request->mapel_id)
            ->where('semester', $request->semester)
            ->where('tahun_ajaran', $request->tahun_ajaran)
            ->first();

        if ($existingNilai) {
            return redirect()->back()->withErrors(['error' => 'Nilai untuk siswa dan mata pelajaran ini sudah ada.']);
        }

        // Simpan nilai baru
        Nilai::create($request->all());

        return redirect()->route('akademik.input-nilai', $request->siswa_id)->with('success', 'Nilai berhasil ditambahkan.');
    }

    public function downloadNilai($id)
    {
        // Pastikan siswa ada
        $siswa = Siswa::findOrFail($id);

        $fileName = 'nilai_' . $siswa->nama_siswa . '_' . date('Y-m-d_H-i-s') . '.xlsx';
        return Excel::download(new \App\Exports\NilaiExport([$id]), $fileName);
    }
    
    public function pilihSiswa()
    {
        $siswa = Siswa::paginate(10);
        return view('akademik.pilih-siswa', compact('siswa'));
    }

    public function nilaiSiswa($id)
    {
        $siswa = Siswa::findOrFail($id);
        $nilai = Nilai::where('siswa_id', $id)->with('mataPelajaran')->get();
        return view('akademik.laporan-nilai', compact('siswa', 'nilai'));
    }
    public function deleteNilai($id)
    {
        $nilai = Nilai::findOrFail($id);
        $nilai->delete();

        return redirect()->back()->with('success', 'Nilai berhasil dihapus.');
    }
}
