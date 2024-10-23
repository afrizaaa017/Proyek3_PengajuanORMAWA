<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Berkas extends Model
{
    use HasFactory;

    protected $fillable = [
        'scan_ktp',
        'surat_sehat',
        'surat_rekomendasi_jurusan',
        'transkip_rekomendasi_jurusan',
        'sertifikat_lkmm',
        'sertifikat_pelatihan_kepemimpinan',
        'sertifikat_pelatihan_emosional_spiritual',
        'sertifikat_bahasa_asing',
        'scan_ktm',
        'surat_keterangan_berkelakuan_baik',
        'surat_penyataan_mandiri',
        'sertifikat_pkkmb',
        'sertifikat_bela_negara',
        'sertifikat_agent_of_change',
        'sertifikat_berorganisasi',
        'berita_acara_pemilihan'
    ];
}