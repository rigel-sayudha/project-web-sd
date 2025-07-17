<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KotakSaran;

class KotakSaranController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'nullable|string|max:100',
            'message' => 'required|string|max:1000',
        ]);
        KotakSaran::create([
            'nama' => $request->input('nama'),
            'message' => $request->input('message'),
        ]);
        return redirect()->back()->with('success', 'Saran Anda berhasil dikirim!');
    }

    public function index()
    {
        $sarans = KotakSaran::latest()->take(10)->get();
        return view('kotak-saran.index', compact('sarans'));
    }
}
