<?php

namespace App\Exports;

use App\Models\Nilai;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class NilaiExport implements FromCollection, WithHeadings
{
    protected $siswaIds;

    public function __construct($siswaIds)
    {
        $this->siswaIds = $siswaIds;
    }

    public function collection()
    {
        return Nilai::with(['siswa', 'mataPelajaran'])
            ->whereIn('siswa_id', $this->siswaIds)
            ->get()
            ->map(function ($item) {
                return [
                    'Nama Siswa'      => $item->siswa->nama_siswa,
                    'Mata Pelajaran'  => $item->mataPelajaran->nama_mapel,
                    'Nilai'           => $item->nilai,
                    'Semester'        => $item->semester,
                    'Tahun Ajaran'    => $item->tahun_ajaran,
                ];
            });
    }

    public function headings(): array
    {
        return ['Nama Siswa', 'Mata Pelajaran', 'Nilai', 'Semester', 'Tahun Ajaran'];
    }
}
