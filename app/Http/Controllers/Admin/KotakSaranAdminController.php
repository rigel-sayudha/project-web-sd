<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\KotakSaran;

class KotakSaranAdminController extends Controller
{
    public function index()
    {
        $sarans = KotakSaran::latest()->paginate(20);
        return view('admin.kotak-saran', compact('sarans'));
    }
}
