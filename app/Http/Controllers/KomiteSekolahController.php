<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class KomiteSekolahController extends Controller
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
                'video_url' => $this->getYoutubeId('https://youtu.be/h7YfOQfK0L4?si=uX4sjXl5xYCleNpK'),
                'title' => 'Evaluasi dan Refleksi',
                'description' => 'Kegiatan evaluasi dan refleksi ini dilakukan di awal semester kedua, untuk mempersiapkan program yang lebih baik lagi di semester kedua. Kegiatan ini melibatkan dewan guru, komite sekolah serta perwakilan dari paguyuban kelas.'
            ],
            [
                'video_url' => $this->getYoutubeId('https://youtu.be/cg3zt4YGzrU?si=yn446j-GYP10qpSG'),
                'title' => 'Rapat Komite',
                'description' => 'Rapat rutin komite sekolah bersama dengan kepala sekolah dan dewan guru untuk membahas program sekolah.'
            ]
        ];

        return view('profil.komite-sekolah', compact('newsItems'));
    }
}
