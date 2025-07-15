<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class BeritaController extends Controller
{
    public function index()
    {
        $articles = Article::where('status', 'published')
            ->orderBy('created_at', 'desc')
            ->paginate(9);

        return view('berita', compact('articles'));
    }

    public function show($slug)
    {
        $article = Article::where('slug', $slug)
            ->where('status', 'published')
            ->firstOrFail();

        $recentArticles = Article::where('status', 'published')
            ->where('id', '!=', $article->id)
            ->orderBy('created_at', 'desc')
            ->limit(3)
            ->get();

        return view('berita-detail', compact('article', 'recentArticles'));
    }

    public function apiShow($id)
    {
        $article = Article::where('id', $id)
            ->where('status', 'published')
            ->firstOrFail();

        return response()->json([
            'id' => $article->id,
            'judul' => $article->judul,
            'konten' => $article->konten,
            'gambar' => $article->gambar,
            'created_at' => $article->created_at->toDateTimeString(),
        ]);
    }
}
