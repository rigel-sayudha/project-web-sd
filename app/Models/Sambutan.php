<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sambutan extends Model
{
    protected $fillable = [
        'nama_kepala',
        'jabatan',
        'foto',
        'isi',
        'status', // published/draft
    ];
}
