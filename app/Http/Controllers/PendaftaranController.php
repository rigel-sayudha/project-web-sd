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
        $now = Carbon::now();
        $startDate = Carbon::create(2025, 5, 15);
        $endDate = Carbon::create(2025, 7, 30);
        
        $is_open = $now->between($startDate, $endDate);
        
        $step = request()->query('step', 1);
        
        $questions = Question::all();
        return view('pendaftaran', compact('is_open', 'step', 'questions'));
    }

    public function store(Request $request)
    {
        $step = $request->query('step');

        if ($step === '2') {
            $validatedData = $request->validate([
                'nama' => 'required|string|max:255',
                'tempat_lahir' => 'required|string|max:255',
                'tanggal_lahir' => [
                    'required',
                    'date',
                ],
                'jenis_kelamin' => 'required|in:L,P',
                'agama' => 'required|string',
                'asal_sekolah' => 'required|string|max:255',
                'nama_ayah' => 'required|string|max:255',
                'nama_ibu' => 'required|string|max:255',
                'alamat_ortu' => 'required|string',
                'telepon_ortu' => 'required|string|max:20',
                'pekerjaan_ayah' => 'required|string|max:255',
                'penghasilan_ayah' => 'required|string|max:255',
                'pekerjaan_ibu' => 'required|string|max:255',
                'penghasilan_ibu' => 'required|string|max:255',
                'status_pip' => 'nullable|string|max:2',
                'file_kk' => 'required|file|mimes:jpg,jpeg,png,pdf|max:2048',
                'file_akta' => 'required|file|mimes:jpg,jpeg,png,pdf|max:2048',
                'nama_wali' => 'nullable|string|max:255',
                'alamat_wali' => 'nullable|string',
                'no_telp_wali' => 'nullable|string|max:20',
                'pekerjaan_wali' => 'nullable|string|max:255',
            ]);

            // Handle file upload
            if ($request->hasFile('file_kk')) {
                $kkFile = $request->file('file_kk');
                $kkName = uniqid('kk_').'.'.$kkFile->getClientOriginalExtension();
                $kkFile->storeAs('public/kk', $kkName);
                $validatedData['file_kk'] = $kkName;
            }
            if ($request->hasFile('file_akta')) {
                $aktaFile = $request->file('file_akta');
                $aktaName = uniqid('akta_').'.'.$aktaFile->getClientOriginalExtension();
                $aktaFile->storeAs('public/akta', $aktaName);
                $validatedData['file_akta'] = $aktaName;
            }

            $validatedData['alamat'] = $validatedData['alamat_ortu'] ?? '';

            \Log::debug('Step2 Validated Data', $validatedData);

            $request->session()->put('registration_data', $validatedData);
            $request->session()->put('completed_step', 2);

            \Log::debug('Step2 Session', [
                'registration_data' => $request->session()->get('registration_data'),
                'completed_step' => $request->session()->get('completed_step'),
            ]);

            // Redirect ke halaman jadwal tes (step 2)
            return redirect()->route('pendaftaran', ['step' => 2]);
        }

        // FINAL STEP: finish (langsung simpan data dan redirect sukses)
        elseif ($step === 'finish') {
            if (!$request->session()->has('registration_data') || $request->session()->get('completed_step') < 2) {
                return redirect()->route('pendaftaran', ['step' => 2])
                    ->withErrors(['error' => 'Silakan lengkapi data pendaftaran terlebih dahulu']);
            }

            // Ambil data pendaftaran dari session
            $registrationData = $request->session()->get('registration_data');
            $jadwal_abk = $request->input('jadwal_abk');
            try {
                \DB::beginTransaction();
                if (empty($registrationData['alamat']) && !empty($registrationData['alamat_ortu'])) {
                    $registrationData['alamat'] = $registrationData['alamat_ortu'];
                }
                $registrationData['jadwal_abk'] = $jadwal_abk;
                $registrationData['status_lolos'] = false;
                // Pastikan kolom yang diperlukan ada
                $registrationData['penghasilan_ayah'] = $registrationData['penghasilan_ayah'] ?? null;
                $registrationData['penghasilan_ibu'] = $registrationData['penghasilan_ibu'] ?? null;
                $registrationData['status_pip'] = $registrationData['status_pip'] ?? null;
                $registrationData['file_kk'] = $registrationData['file_kk'] ?? null;
                $registrationData['file_akta'] = $registrationData['file_akta'] ?? null;
                $registration = Registration::create($registrationData);
                \DB::commit();
                $request->session()->forget([
                    'registration_data',
                    'exam_score',
                    'answers',
                    'completed_step'
                ]);
                return redirect()->route('pendaftaran.success');
            } catch (\Exception $e) {
                \DB::rollback();
                \Log::error('Error saving registration: ' . $e->getMessage());
                return redirect()->back()->withErrors('Terjadi kesalahan saat menyimpan data. Silakan coba lagi.');
            }
        }
        // fallback jika step tidak dikenali
        return redirect()->route('pendaftaran');
    }

    public function success()
    {
        return view('pendaftaran.success');
    }

    public function selectionResults()
    {
        $acceptedRegistrations = \App\Models\Registration::where('status_lolos', 1)
            ->orderBy('nama', 'asc')
            ->get();

        $currentYear = date('Y');

        return view('hasil-seleksi', compact('acceptedRegistrations', 'currentYear'));
    }
}
