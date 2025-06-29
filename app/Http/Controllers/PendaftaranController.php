<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Registration;
use App\Models\Question;
use App\Models\RegistrationPoint;
use Carbon\Carbon;

class PendaftaranController extends Controller
{
    public function index()
    {
        // Check if registration is open (between 15 May - 30 June 2025)
        $now = Carbon::now();
        $startDate = Carbon::create(2025, 5, 15);
        $endDate = Carbon::create(2025, 6, 30);
        
        $is_open = $now->between($startDate, $endDate);
        
        $step = request()->query('step', 1);
        
        $questions = Question::all();
        return view('pendaftaran', compact('is_open', 'step', 'questions'));
    }

    public function store(Request $request)
    {
        $step = $request->query('step', 1);
        
        switch($step) {
            case '2':
                // Validate and store step 1 data in session
                $validatedData = $request->validate([
                    'nama' => 'required|string|max:255',
                    'nik' => 'required|string|size:16|unique:registrations',
                    'tempat_lahir' => 'required|string|max:255',
                    'tanggal_lahir' => 'required|date',
                    'jenis_kelamin' => 'required|in:L,P',
                    'agama' => 'required|string',
                    'nama_ayah' => 'required|string|max:255',
                    'nama_ibu' => 'required|string|max:255',
                    'pekerjaan_ayah' => 'required|string|max:255',
                    'pekerjaan_ibu' => 'required|string|max:255',
                    'alamat' => 'required|string',
                    'no_telp' => 'required|string|max:20',
                    'email' => 'required|email|max:255|unique:registrations'
                ]);
                
                $request->session()->put('registration_data', $validatedData);
                
                // Redirect to step 2 (soal test)
                return redirect()->route('pendaftaran', ['step' => 2]);
                
            case '3':
                // Handle soal test submission
                $answers = $request->input('answers', []);
                $examScore = 0;
                
                // Calculate exam score (10 points per correct answer)
                foreach ($answers as $questionId => $answer) {
                    $question = Question::find($questionId);
                    if ($question && $question->correct_answer === $answer) {
                        $examScore += 10;
                    }
                }
                
                // Store exam score in session
                $request->session()->put('exam_score', $examScore);
                $request->session()->put('answers', $answers);
                
                return redirect()->route('pendaftaran', ['step' => 3]);
                
            case 'finish':
                // Validate donation amount
                $request->validate([
                    'sumbangan' => 'required|integer|min:100000'
                ]);
                
                // Calculate donation points (1 point per 100,000)
                $donationAmount = $request->input('sumbangan');
                $donationPoints = floor($donationAmount / 100000);
                
                // Get registration data from session
                $registrationData = $request->session()->get('registration_data');
                
                \Log::debug('Registration data from session:', $registrationData ?: []);
                
                // Create registration record
                $registration = Registration::create($registrationData);
                
                // Create registration points record
                RegistrationPoint::create([
                    'registration_id' => $registration->id,
                    'exam_score' => $request->session()->get('exam_score', 0),
                    'donation_amount' => $donationAmount,
                    'donation_points' => $donationPoints,
                    'total_points' => $request->session()->get('exam_score', 0) + $donationPoints,
                    'answers' => json_encode($request->session()->get('answers', [])),
                ]);
                
                // Clear session data
                $request->session()->forget(['registration_data', 'exam_score', 'answers']);
                
                return redirect()->route('pendaftaran.success')->with([
                    'exam_score' => $request->session()->get('exam_score', 0),
                    'donation_points' => $donationPoints,
                    'total_points' => $request->session()->get('exam_score', 0) + $donationPoints
                ]);
                
            default:
                return redirect()->route('pendaftaran');
        }
    }
}
