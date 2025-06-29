<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;
use App\Models\Article;

class HomeController extends BaseController
{
    public function index()
    {
        $articles = Article::latest()->take(3)->get();
        return view('home', compact('articles'));
    }
}