<?php

namespace App\Http\Controllers;

use App\Models\Ekstrakurikuler;
use Illuminate\Http\Request;

class EkstrakurikulerController extends Controller
{
    public function index()
    {
        $ekstrakurikulers = Ekstrakurikuler::all();
        return view('admin.pages.ekstrakurikuler.index', compact('ekstrakurikulers'));
    }

    public function create()
    {
        return view('admin.pages.ekstrakurikuler.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'foto' => 'nullable', // validasi manual di bawah
            'is_active' => 'nullable|boolean',
        ]);
        // Jika upload file, simpan ke storage
        if ($request->hasFile('foto')) {
            $validated['foto'] = $request->file('foto')->store('ekstrakurikuler', 'public');
        } else if ($request->filled('foto') && filter_var($request->input('foto'), FILTER_VALIDATE_URL)) {
            $validated['foto'] = $request->input('foto'); // Simpan URL jika diberikan
        } else {
            $validated['foto'] = null;
        }
        $validated['is_active'] = $request->has('is_active');
        Ekstrakurikuler::create($validated);
        return redirect()->route('admin.ekstrakurikuler.index')->with('success', 'Ekstrakurikuler berhasil ditambahkan!');
    }

    public function edit(Ekstrakurikuler $ekstrakurikuler)
    {
        return view('admin.pages.ekstrakurikuler.edit', compact('ekstrakurikuler'));
    }

    public function update(Request $request, Ekstrakurikuler $ekstrakurikuler)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'foto' => 'nullable', // validasi manual di bawah
            'is_active' => 'nullable|boolean',
        ]);
        if ($request->hasFile('foto')) {
            $validated['foto'] = $request->file('foto')->store('ekstrakurikuler', 'public');
        } else if ($request->filled('foto') && filter_var($request->input('foto'), FILTER_VALIDATE_URL)) {
            $validated['foto'] = $request->input('foto');
        }
        $validated['is_active'] = $request->has('is_active');
        $ekstrakurikuler->update($validated);
        return redirect()->route('admin.ekstrakurikuler.index')->with('success', 'Ekstrakurikuler berhasil diperbarui!');
    }

    public function destroy(Ekstrakurikuler $ekstrakurikuler)
    {
        $ekstrakurikuler->delete();
        return redirect()->route('admin.ekstrakurikuler.index')->with('success', 'Ekstrakurikuler berhasil dihapus!');
    }
}
