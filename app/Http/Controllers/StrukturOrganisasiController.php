<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\StrukturOrganisasi;

class StrukturOrganisasiController extends Controller
{
    public function index()
    {
        $strukturs = StrukturOrganisasi::all();
        $organizationImage = \Storage::disk('public')->exists('organization/struktur.png')
            ? '/storage/organization/struktur.png'
            : '/images/struktur-placeholder.png';
        return view('struktur-organisasi', compact('strukturs', 'organizationImage'));
    }
}
