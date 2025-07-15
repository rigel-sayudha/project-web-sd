<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Poster;
use Illuminate\Support\Facades\Storage;

class PosterController extends Controller
{
    public function index()
    {
        $posters = Poster::orderByDesc('created_at')->get();
        return view('admin.pages.poster.index', compact('posters'));
    }

    public function create()
    {
        return view('admin.pages.poster.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'gambar' => 'required|image|max:2048',
            'status' => 'required|in:draft,published',
        ]);
        $path = $request->file('gambar')->store('posters', 'public');
        Poster::create([
            'gambar' => $path,
            'status' => $request->status,
        ]);
        return redirect()->route('admin.poster.index')->with('success', 'Poster berhasil ditambahkan');
    }

    public function edit(Poster $poster)
    {
        return view('admin.pages.poster.edit', compact('poster'));
    }

    public function update(Request $request, Poster $poster)
    {
        $request->validate([
            'gambar' => 'nullable|image|max:2048',
            'status' => 'required|in:draft,published',
        ]);
        if ($request->hasFile('gambar')) {
            Storage::disk('public')->delete($poster->gambar);
            $path = $request->file('gambar')->store('posters', 'public');
            $poster->gambar = $path;
        }
        $poster->status = $request->status;
        $poster->save();
        return redirect()->route('admin.poster.index')->with('success', 'Poster berhasil diupdate');
    }

    public function destroy(Poster $poster)
    {
        Storage::disk('public')->delete($poster->gambar);
        $poster->delete();
        return redirect()->route('admin.poster.index')->with('success', 'Poster berhasil dihapus');
    }

    public function activate(Poster $poster)
    {
        // Nonaktifkan semua poster published
        Poster::where('status', 'published')->update(['status' => 'draft']);
        $poster->status = 'published';
        $poster->save();
        return redirect()->route('admin.poster.index')->with('success', 'Poster diaktifkan sebagai pop-up utama.');
    }

    public function deactivate(Poster $poster)
    {
        $poster->status = 'draft';
        $poster->save();
        return redirect()->route('admin.poster.index')->with('success', 'Poster dinonaktifkan.');
    }
}
