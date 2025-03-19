<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PPDBController extends Controller
{
    private function getYoutubeId($url) 
    {
        $pattern = '/(?:youtube\.com\/(?:[^\/]+\/.+\/|(?:v|e(?:mbed)?)\/|.*[?&]v=)|youtu\.be\/)([^"&?\/\s]{11})/i';
        preg_match($pattern, $url, $matches);
        
        return isset($matches[1]) ? $matches[1] : $url;
    }

    public function index()
    {
        $newsItems = [
            [
                'video_url' => $this->getYoutubeId('https://youtu.be/s6s-ZnxYXt8?si=JDa0n8yPy_iLMiVW'),
                'title' => 'Informasi PPDB 2024',
                'description' => 'Informasi lengkap mengenai Penerimaan Peserta Didik Baru (PPDB) tahun ajaran 2024/2025'
            ],
            [
                'video_url' => $this->getYoutubeId('https://youtu.be/9pIpII9dLOI?si=_zSXslwOKRcoSclL'),
                'title' => 'Alur Pendaftaran PPDB',
                'description' => 'Penjelasan detail mengenai alur pendaftaran PPDB online dan offline'
            ]
        ];

        return view('ppdb', compact('newsItems'));
    }
}
