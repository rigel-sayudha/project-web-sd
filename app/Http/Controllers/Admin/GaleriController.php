<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Galeri;

class GaleriController extends Controller
{
    // Tampilkan semua galeri untuk admin (CRUD)
    public function index()
    {
        $galeri = Galeri::orderBy('created_at', 'desc')->get();
        return view('admin.galeri.index', compact('galeri'));
    }

    // Form tambah galeri
    public function create()
    {
        return view('admin.galeri.create');
    }

    // Simpan galeri baru
    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required',
            'deskripsi' => 'required',
            'tipe' => 'required|in:foto,video',
            'file' => 'required|file',
        ]);
        $data = $request->only(['judul', 'deskripsi', 'tipe']);
        if ($request->hasFile('file')) {
            $uploaded = $request->file('file');
            $filename = time().'_'.$uploaded->getClientOriginalName();
            $uploaded->storeAs('public/galeri', $filename);
            $data['file'] = $filename;
        }
        Galeri::create($data);
        return redirect()->route('admin.galeri.index')->with('success', 'Galeri berhasil ditambahkan');
    }

    // Form edit galeri
    public function edit($id)
    {
        $item = Galeri::findOrFail($id);
        return view('admin.galeri.edit', compact('item'));
    }

    // Update galeri
    public function update(Request $request, $id)
    {
        $item = Galeri::findOrFail($id);
        $data = $request->only(['judul', 'deskripsi', 'tipe']);
        if ($request->hasFile('file')) {
            $uploaded = $request->file('file');
            $filename = time().'_'.$uploaded->getClientOriginalName();
            $uploaded->storeAs('public/galeri', $filename);
            $data['file'] = $filename;
        }
        $item->update($data);
        return redirect()->route('admin.galeri.index')->with('success', 'Galeri berhasil diupdate');
    }

    // Hapus galeri
    public function destroy($id)
    {
        $item = Galeri::findOrFail($id);
        $item->delete();
        return redirect()->route('admin.galeri.index')->with('success', 'Galeri berhasil dihapus');
    }
}
