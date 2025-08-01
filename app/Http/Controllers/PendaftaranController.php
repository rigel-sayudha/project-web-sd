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
        $step = request()->query('step', 1);
        
        $questions = Question::all();
        return view('pendaftaran', compact('step', 'questions'));
    }

    public function store(Request $request)
    {

        $step = $request->query('step');

        // Step 1: Simpan data ke database dengan status draft
        if ($step == 2) {
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
            $validatedData['status_lolos'] = false;
            $validatedData['status'] = 'draft';

            $registration = Registration::create($validatedData);

            // Redirect ke step 2 dengan id pendaftaran
            return redirect()->route('pendaftaran', ['step' => 2, 'id' => $registration->id]);
        }

        // FINAL STEP: finish (langsung simpan data dan redirect sukses)
        elseif ($step === 'finish') {
            $id = $request->query('id');
            $jadwal_abk = $request->input('jadwal_abk');
            $registration = Registration::find($id);
            if (!$registration || $registration->status !== 'draft') {
                return redirect()->route('pendaftaran', ['step' => 1])
                    ->withErrors(['error' => 'Data pendaftaran tidak ditemukan, silakan isi data diri terlebih dahulu.']);
            }
            $registration->jadwal_abk = $jadwal_abk;
            $registration->status = 'final';
            $registration->save();
            return redirect()->route('pendaftaran.success');
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
