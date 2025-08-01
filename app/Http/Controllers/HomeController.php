<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;
use App\Models\Article;
use App\Models\RegistrationPoint;

class HomeController extends BaseController
{
    public function index()
    {
        $articles = Article::orderBy('created_at', 'desc')->take(6)->get();
        $ekstrakurikulers = \App\Models\Ekstrakurikuler::where('is_active', true)->get();

        // Fetch students with status_lolos = 1 and eager load registration data
        $acceptedRegistrations = RegistrationPoint::with('registration')
            ->where('status_lolos', 1)
            ->orderBy('total_points', 'desc')
            ->get();

        $beritaSekolah = Article::where('status', 'published')->orderBy('created_at', 'desc')->take(4)->get();

        return view('home', compact('articles', 'ekstrakurikulers', 'acceptedRegistrations', 'beritaSekolah'));
    }
}
