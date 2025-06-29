<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Registration;
use App\Models\RegistrationPoint;

class AdminController extends Controller
{
    public function dashboard()
    {
        return view('admin.pages.dashboard');
    }

    public function leaderboard()
    {
        $leaderboard = RegistrationPoint::with('registration')
            ->orderBy('total_points', 'desc')
            ->get();

        return view('admin.pages.leaderboard', compact('leaderboard'));
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
        return view('admin.pages.organization.index');
    }
}
