<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $fillable = [
        'question',
        'option_a',
        'option_b',
        'option_c',
        'option_d',
        'correct_answer'
    ];

    public static function calculateScore($answers)
    {
        $score = 0;
        foreach ($answers as $questionId => $answer) {
            $question = self::find($questionId);
            if ($question && $question->correct_answer === $answer) {
                $score += 4; // 4 poin per jawaban benar
            }
        }
        return $score;
    }
}
