<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Article;

class ArticleSeeder extends Seeder
{
    public function run()
    {
        $articles = [
            [
                'judul' => 'Peringatan Hari Kartini di Sekolah',
                'slug' => 'peringatan-hari-kartini-di-sekolah',
                'konten' => '<p>Sekolah mengadakan peringatan Hari Kartini dengan berbagai kegiatan menarik.</p>',
                'gambar' => null,
                'user_id' => 1,
                'status' => 'published',
            ],
            [
                'judul' => 'Prestasi Siswa dalam Lomba Matematika',
                'slug' => 'prestasi-siswa-dalam-lomba-matematika',
                'konten' => '<p>Siswa kami berhasil meraih juara dalam lomba matematika tingkat kota.</p>',
                'gambar' => null,
                'user_id' => 1,
                'status' => 'published',
            ],
            [
                'judul' => 'Ekstrakurikuler Baru: Robotika',
                'slug' => 'ekstrakurikuler-baru-robotika',
                'konten' => '<p>Sekolah membuka ekstrakurikuler robotika untuk mengembangkan kreativitas siswa.</p>',
                'gambar' => null,
                'user_id' => 1,
                'status' => 'published',
            ],
        ];

        foreach ($articles as $article) {
            Article::create($article);
        }
    }
}
