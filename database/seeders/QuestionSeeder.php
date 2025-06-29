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
                'question' => '2 + 2 = ?',
                'option_a' => '3',
                'option_b' => '4',
                'option_c' => '5',
                'option_d' => '6',
                'correct_answer' => 'B'
            ],
            [
                'question' => 'Ibu kota Indonesia adalah?',
                'option_a' => 'Jakarta',
                'option_b' => 'Bandung',
                'option_c' => 'Surabaya',
                'option_d' => 'Medan',
                'correct_answer' => 'A'
            ],
            [
                'question' => 'Berapa hasil dari 5 x 6?',
                'option_a' => '30',
                'option_b' => '25',
                'option_c' => '35',
                'option_d' => '40',
                'correct_answer' => 'A'
            ],
            [
                'question' => 'Planet terdekat dengan Matahari adalah?',
                'option_a' => 'Venus',
                'option_b' => 'Bumi',
                'option_c' => 'Merkurius',
                'option_d' => 'Mars',
                'correct_answer' => 'C'
            ],
            [
                'question' => 'Bahasa pemrograman yang digunakan untuk web adalah?',
                'option_a' => 'Python',
                'option_b' => 'JavaScript',
                'option_c' => 'C++',
                'option_d' => 'Java',
                'correct_answer' => 'B'
            ],
            [
                'question' => 'Siapa penemu lampu pijar?',
                'option_a' => 'Nikola Tesla',
                'option_b' => 'Thomas Edison',
                'option_c' => 'Alexander Graham Bell',
                'option_d' => 'Albert Einstein',
                'correct_answer' => 'B'
            ],
            [
                'question' => 'Apa ibu kota Jepang?',
                'option_a' => 'Seoul',
                'option_b' => 'Tokyo',
                'option_c' => 'Beijing',
                'option_d' => 'Bangkok',
                'correct_answer' => 'B'
            ],
            [
                'question' => 'Berapa jumlah provinsi di Indonesia?',
                'option_a' => '34',
                'option_b' => '33',
                'option_c' => '35',
                'option_d' => '32',
                'correct_answer' => 'A'
            ],
            [
                'question' => 'Apa warna campuran merah dan biru?',
                'option_a' => 'Hijau',
                'option_b' => 'Ungu',
                'option_c' => 'Kuning',
                'option_d' => 'Oranye',
                'correct_answer' => 'B'
            ],
            [
                'question' => 'Siapa presiden pertama Indonesia?',
                'option_a' => 'Soekarno',
                'option_b' => 'Soeharto',
                'option_c' => 'Joko Widodo',
                'option_d' => 'B.J. Habibie',
                'correct_answer' => 'A'
            ],
        ];

        foreach ($questions as $q) {
            Question::create($q);
        }
    }
}
