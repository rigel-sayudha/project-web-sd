<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Question;

class QuestionSeeder extends Seeder
{
    public function run()
    {
        $questions = [
            [
                'question' => 'Jika kamu tidak tahu cara mengerjakan sesuatu, apa yang kamu lakukan?',
                'option_a' => 'Bertanya pada orang lain',
                'option_b' => 'Marah dan meninggalkan tugas',
                'option_c' => 'Menangis atau diam saja',
                'option_d' => 'Melempar atau merusak benda di sekitar',
                'correct_answer' => 'A' // default ke A jika tidak ada kunci
            ],
            [
                'question' => 'Saat kamu bermain dengan teman dan temanmu mengambil mainanmu, apa yang kamu lakukan?',
                'option_a' => 'Mengatakan dengan sopan agar dia mengembalikan',
                'option_b' => 'Menarik mainannya kembali dengan paksa',
                'option_c' => 'Menangis dan lari dari situ',
                'option_d' => 'Mendorong atau memukul teman itu',
                'correct_answer' => 'A'
            ],
            [
                'question' => 'Jika guru menyuruh duduk dan diam, kamu biasanya...',
                'option_a' => 'Duduk dan mendengarkan',
                'option_b' => 'Duduk sebentar lalu mulai bicara sendiri',
                'option_c' => 'Tidak bisa diam, selalu bergerak',
                'option_d' => 'Berjalan-jalan dan tidak memperhatikan',
                'correct_answer' => 'A' // default ke A jika tidak ada kunci
            ],
            [
                'question' => 'Apakah kamu suka suara keras seperti bel, petir, atau mesin?',
                'option_a' => 'Biasa saja',
                'option_b' => 'Kadang takut',
                'option_c' => 'Sering menutup telinga',
                'option_d' => 'Sangat takut dan menangis setiap kali mendengar',
                'correct_answer' => 'A' // default ke A jika tidak ada kunci
            ],
            [
                'question' => 'Saat melihat orang lain sedih, kamu biasanya merasa:',
                'option_a' => 'Ikut sedih dan ingin membantu',
                'option_b' => 'Tidak tahu harus bagaimana',
                'option_c' => 'Bingung lalu pergi',
                'option_d' => 'Tidak peduli sama sekali',
                'correct_answer' => 'A' // default ke A jika tidak ada kunci
            ],
            [
                'question' => 'Apakah kamu suka memutar benda, melompat terus-menerus, atau mengulang kata yang sama?',
                'option_a' => 'Tidak pernah',
                'option_b' => 'Kadang',
                'option_c' => 'Sering',
                'option_d' => 'Hampir setiap hari',
                'correct_answer' => 'A' // default ke A jika tidak ada kunci
            ],
            [
                'question' => 'Ketika orang tua atau guru memanggilmu, kamu biasanya...',
                'option_a' => 'Langsung menjawab',
                'option_b' => 'Kadang mendengar, kadang tidak',
                'option_c' => 'Sering tidak menjawab meski dekat',
                'option_d' => 'Tidak peduli dan tetap melakukan kegiatan sendiri',
                'correct_answer' => 'A' // default ke A jika tidak ada kunci
            ],
        ];

        // Pastikan semua soal punya correct_answer
        foreach ($questions as &$q) {
            if (!isset($q['correct_answer']) || $q['correct_answer'] === null) {
                $q['correct_answer'] = 'A';
            }
        }
        unset($q);

        foreach ($questions as $q) {
            Question::create($q);
        }
    }
}
