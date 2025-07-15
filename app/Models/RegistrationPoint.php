<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RegistrationPoint extends Model
{
    protected $fillable = [
        'registration_id',
        'exam_score',
        'donation_amount',
        'donation_points',
        'total_points',
        'answers',
        'status_lolos',
    ];

    protected $casts = [
        'answers' => 'array'
    ];

    public function registration()
    {
        return $this->belongsTo(Registration::class);
    }

    public static function calculateDonationPoints($amount)
    {
        // Konversi sumbangan ke poin
        // Contoh: setiap Rp 100.000 = 1 poin
        return floor($amount / 100000);
    }
}
