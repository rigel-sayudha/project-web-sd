<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\Registration;
use App\Models\RegistrationPoint;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\AcceptedRegistrationsExport;

class AdminController extends Controller
{
    public function printRegistration($id)
    {
        $registration = Registration::findOrFail($id);
        $pdf = Pdf::loadView('admin.print.registration', compact('registration'));
        return $pdf->stream('pendaftaran-'.$registration->nama.'.pdf');
    }
    /**
     * Meloloskan siswa (total poin < 21) secara manual oleh admin
     */
    public function loloskanSiswa($id)
    {
        $registration = Registration::findOrFail($id);
        if (!$registration->status_lolos) {
            $registration->status_lolos = 1;
            $registration->save();
            return redirect()->back()->with('success', 'Siswa berhasil diloloskan!');
        }
        return redirect()->back()->with('error', 'Siswa sudah diloloskan.');
    }

    /**
     * Mengubah status siswa menjadi belum lolos (status_lolos = 0)
     */
    public function belumLoloskanSiswa($id)
    {
        $registration = Registration::findOrFail($id);
        if ($registration->status_lolos) {
            $registration->status_lolos = 0;
            $registration->save();
            return redirect()->back()->with('success', 'Status siswa diubah menjadi belum lolos!');
        }
        return redirect()->back()->with('error', 'Siswa sudah berstatus belum lolos.');
    }

    public function leaderboard(Request $request)
    {
        $registrations = Registration::orderBy('created_at', 'desc')->get();
        return view('admin.leaderboard', compact('registrations'));
    }

    public function articles()
    {
        return view('admin.pages.articles.index');
    }

    public function announcements()
    {
        return view('admin.pages.announcements.index');
    }

    public function registrations()
    {
        return view('admin.pages.registrations.index');
    }

    public function organization()
    {
        $organizationImage = \Storage::disk('public')->exists('organization/struktur.png')
            ? '/storage/organization/struktur.png'
            : '/images/struktur-placeholder.png';
        return view('admin.organization', compact('organizationImage'));
    }

    public function profile()
    {
        return view('admin.profile');
    }

    public function updateProfile(Request $request)
    {
        $user = auth()->user();
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email,' . $user->id,
            'password' => 'nullable|string|min:6',
            'avatar' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $user->name = $request->name;
        $user->email = $request->email;
        if ($request->filled('password')) {
            $user->password = bcrypt($request->password);
        }
        if ($request->hasFile('avatar')) {
            $avatar = $request->file('avatar')->store('avatars', 'public');
            $user->avatar = '/storage/' . $avatar;
        }
        $user->save();

        return redirect()->route('admin.profile')->with('success', 'Profil berhasil diperbarui!');
    }

    public function updateOrganization(Request $request)
    {
        $request->validate([
            'organization_image' => 'nullable|image|mimes:jpg,jpeg,png|max:4096',
        ]);
        if ($request->hasFile('organization_image')) {
            $path = $request->file('organization_image')->storeAs('organization', 'struktur.png', 'public');
        }
        return redirect()->route('admin.organization')->with('success', 'Struktur organisasi berhasil diperbarui!');
    }

    public function exportAcceptedRegistrations()
    {
        $filename = 'rekap_siswa_lolos_seleksi.xlsx';
        return Excel::download(new AcceptedRegistrationsExport, $filename);
    }
    public function printAcceptedRegistrations()
    {
        $registrations = Registration::where('status_lolos', 1)->orderBy('nama')->get();
        $pdf = \Barryvdh\DomPDF\Facade\Pdf::loadView('admin.print.accepted-registrations', compact('registrations'));
        $pdf->setPaper('a4', 'landscape');
        return $pdf->stream('rekap-siswa-lolos.pdf');
    }
}
