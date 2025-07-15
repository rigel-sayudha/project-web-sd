<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Galeri;

class GaleriController extends Controller
{
    // Tampilkan galeri publik
    public function index()
    {
        $galeri = Galeri::where('is_active', true)->orderBy('created_at', 'desc')->get();
        return view('galeri.index', compact('galeri'));
    }

    // Detail galeri (optional, jika ingin per foto/video)
    // public function show($id)
    // {
    //     $item = Galeri::findOrFail($id);
    //     return view('galeri.show', compact('item'));
    // }
}
