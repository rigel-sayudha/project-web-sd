<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sambutan;
use Illuminate\Support\Facades\Storage;

class SambutanController extends Controller
{
    public function index()
    {
        $sambutans = Sambutan::orderByDesc('created_at')->paginate(10);
        return view('admin.pages.sambutan.index', compact('sambutans'));
    }

    public function create()
    {
        return view('admin.pages.sambutan.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_kepala' => 'required|string|max:255',
            'jabatan' => 'nullable|string|max:255',
            'isi' => 'required',
            'status' => 'required|in:published,draft',
            'foto' => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('foto')) {
            $validated['foto'] = $request->file('foto')->store('sambutan', 'public');
        }

        // Jika status published, set semua sambutan lain menjadi draft
        if ($validated['status'] === 'published') {
            Sambutan::where('status', 'published')->update(['status' => 'draft']);
        }
        Sambutan::create($validated);
        $msg = 'Sambutan berhasil ditambahkan.';
        if ($validated['status'] === 'published') {
            $msg .= ' Sambutan lain otomatis diubah menjadi draft.';
        }
        return redirect()->route('admin.sambutan.index')->with('success', $msg);
    }

    public function edit(Sambutan $sambutan)
    {
        return view('admin.pages.sambutan.edit', compact('sambutan'));
    }

    public function update(Request $request, Sambutan $sambutan)
    {
        $validated = $request->validate([
            'nama_kepala' => 'required|string|max:255',
            'jabatan' => 'nullable|string|max:255',
            'isi' => 'required',
            'status' => 'required|in:published,draft',
            'foto' => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('foto')) {
            if ($sambutan->foto) {
                Storage::disk('public')->delete($sambutan->foto);
            }
            $validated['foto'] = $request->file('foto')->store('sambutan', 'public');
        }

        // Jika status published, set semua sambutan lain menjadi draft
        if ($validated['status'] === 'published') {
            Sambutan::where('status', 'published')->where('id', '!=', $sambutan->id)->update(['status' => 'draft']);
        }
        $sambutan->update($validated);
        $msg = 'Sambutan berhasil diupdate.';
        if ($validated['status'] === 'published') {
            $msg .= ' Sambutan lain otomatis diubah menjadi draft.';
        }
        return redirect()->route('admin.sambutan.index')->with('success', $msg);
    }

    public function destroy(Sambutan $sambutan)
    {
        if ($sambutan->foto) {
            Storage::disk('public')->delete($sambutan->foto);
        }
        $sambutan->delete();
        return redirect()->route('admin.sambutan.index')->with('success', 'Sambutan berhasil dihapus.');
    }
}
