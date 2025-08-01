<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Registration extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
        'nik',
        'tempat_lahir',
        'tanggal_lahir',
        'jenis_kelamin',
        'agama',
        'nama_ayah',
        'nama_ibu',
        'pekerjaan_ayah',
        'penghasilan_ayah',
        'pekerjaan_ibu',
        'penghasilan_ibu',
        'alamat',
        'telepon_ortu',
        'jadwal_abk',
        'status_lolos',
        'status_pip',
        'file_kk',
        'file_akta',
        'nama_wali',
        'alamat_wali',
        'no_telp_wali',
        'pekerjaan_wali',
        'tes_warna',
        'interaksi',
        'tes_baca_tulis',
        'abk',
        'total_poin',
    ];
}
