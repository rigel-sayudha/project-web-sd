<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ChatController extends Controller
{
    public function chat(Request $request)
    {
        $message = $request->input('message');
        

        $responses = [
            'Terima kasih atas pertanyaan Anda. Saya akan membantu menjawabnya.',
            'Mohon tunggu sebentar, saya akan mencari informasi yang tepat.',
            'Baik, saya mengerti pertanyaan Anda. Berikut jawabannya...',
            'Untuk informasi lebih lanjut, Anda bisa menghubungi bagian administrasi sekolah.',
            'Apakah ada hal lain yang bisa saya bantu?'
        ];
        
        return response()->json([
            'reply' => $responses[array_rand($responses)]
        ]);
    }
}
