<?php

namespace App\Http\Requests;

use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Http\FormRequest;

class StoreBerkasRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        if (!Auth::check()) {
            return false; 
        }

        return true;
        
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'scan_ktp' => 'required|mimes:pdf|max:2048',
            'surat_sehat' => 'required|mimes:pdf|max:2048',
            'surat_rekomendasi_jurusan' => 'required|mimes:pdf|max:2048',
            'transkip_rekomendasi_jurusan' => 'required|mimes:pdf|max:2048',
            'sertifikat_lkmm' => 'required|mimes:pdf|max:2048',
            'sertifikat_pelatihan_kepemimpinan' => 'required|mimes:pdf|max:2048',
            'sertifikat_pelatihan_emosional_spiritual' => 'nullable|file|mimes:pdf|max:2048',
            'sertifikat_bahasa_asing' => 'required|mimes:pdf|max:2048',
            'scan_ktm' => 'required|mimes:pdf|max:2048',
            'surat_keterangan_berkelakuan_baik' => 'required|mimes:pdf|max:2048',
            'surat_penyataan_mandiri' => 'required|mimes:pdf|max:2048',
            'sertifikat_pkkmb' => 'required|mimes:pdf|max:2048',
            'sertifikat_bela_negara' => 'required|mimes:pdf|max:2048',
            'sertifikat_agent_of_change' => 'nullable|file|mimes:pdf|max:2048',
            'sertifikat_berorganisasi' => 'required|mimes:pdf|max:2048',
            'berita_acara_pemilihan' => 'required|mimes:pdf|max:2048',
            'surat_pernyataan' => 'nullable|file|mimes:pdf|max:2048',
            'surat_perjanjian' => 'nullable|file|mimes:pdf|max:2048',
            'surat_mou' => 'nullable|file|mimes:pdf|max:5120',
            'surat_kak' => 'nullable|file|mimes:pdf|max:5120',
        ];
    }

    public function messages()
    {
        return [
            'scan_ktp.mimes' => 'File KTP harus berformat PDF.',
            'scan_ktp.max' => 'Ukuran file KTP tidak boleh lebih dari 2 MB.',
            'surat_sehat.mimes' => 'Surat sehat harus berformat PDF.',
            'surat_sehat.max' => 'Ukuran file surat sehat tidak boleh lebih dari 2 MB.',
            'surat_rekomendasi_jurusan.mimes' => 'Surat rekomendasi jurusan harus berformat PDF.',
            'surat_rekomendasi_jurusan.max' => 'Ukuran file surat rekomendasi jurusan tidak boleh lebih dari 2 MB.',
            'transkip_rekomendasi_jurusan.mimes' => 'Transkip rekomendasi jurusan harus berformat PDF.',
            'transkip_rekomendasi_jurusan.max' => 'Ukuran file transkip rekomendasi jurusan tidak boleh lebih dari 2 MB.',
            'sertifikat_lkmm.mimes' => 'Sertifikat LKMM harus berformat PDF.',
            'sertifikat_lkmm.max' => 'Ukuran file sertifikat LKMM tidak boleh lebih dari 2 MB.',
            'sertifikat_pelatihan_kepemimpinan.mimes' => 'Sertifikat pelatihan kepemimpinan harus berformat PDF.',
            'sertifikat_pelatihan_kepemimpinan.max' => 'Ukuran file sertifikat pelatihan kepemimpinan tidak boleh lebih dari 2 MB.',
            'sertifikat_pelatihan_emosional_spiritual.mimes' => 'Sertifikat pelatihan emosional spiritual harus berformat PDF.',
            'sertifikat_pelatihan_emosional_spiritual.max' => 'Ukuran file sertifikat pelatihan emosional spiritual tidak boleh lebih dari 2 MB.',
            'sertifikat_bahasa_asing.mimes' => 'Sertifikat bahasa asing harus berformat PDF.',
            'sertifikat_bahasa_asing.max' => 'Ukuran file sertifikat bahasa asing tidak boleh lebih dari 2 MB.',
            'scan_ktm.mimes' => 'File KTM harus berformat PDF.',
            'scan_ktm.max' => 'Ukuran file KTM tidak boleh lebih dari 2 MB.',
            'surat_keterangan_berkelakuan_baik.mimes' => 'Surat keterangan berkelakuan baik harus berformat PDF.',
            'surat_keterangan_berkelakuan_baik.max' => 'Ukuran file surat keterangan berkelakuan baik tidak boleh lebih dari 2 MB.',
            'surat_penyataan_mandiri.mimes' => 'Surat penyataan mandiri harus berformat PDF.',
            'surat_penyataan_mandiri.max' => 'Ukuran file surat penyataan mandiri tidak boleh lebih dari 2 MB.',
            'sertifikat_pkkmb.mimes' => 'Sertifikat PKKMB harus berformat PDF.',
            'sertifikat_pkkmb.max' => 'Ukuran file sertifikat PKKMB tidak boleh lebih dari 2 MB.',
            'sertifikat_bela_negara.mimes' => 'Sertifikat bela negara harus berformat PDF.',
            'sertifikat_bela_negara.max' => 'Ukuran file sertifikat bela negara tidak boleh lebih dari 2 MB.',
            'sertifikat_agent_of_change.mimes' => 'Sertifikat Agent of Change harus berformat PDF.',
            'sertifikat_agent_of_change.max' => 'Ukuran file sertifikat Agent of Change tidak boleh lebih dari 2 MB.',
            'sertifikat_berorganisasi.mimes' => 'Sertifikat berorganisasi harus berformat PDF.',
            'sertifikat_berorganisasi.max' => 'Ukuran file sertifikat berorganisasi tidak boleh lebih dari 2 MB.',
            'berita_acara_pemilihan.mimes' => 'Berita acara pemilihan harus berformat PDF.',
            'berita_acara_pemilihan.max' => 'Ukuran file berita acara pemilihan tidak boleh lebih dari 2 MB.',
            'surat_pernyataan.mimes' => 'Surat pernyataan harus berformat PDF.',
            'surat_pernyataan.max' => 'Ukuran file surat pernyataan tidak boleh lebih dari 2 MB.',
            'surat_perjanjian.mimes' => 'Surat perjanjian harus berformat PDF.',
            'surat_perjanjian.max' => 'Ukuran file surat perjanjian tidak boleh lebih dari 2 MB.',
            'surat_mou.mimes' => 'Surat MoU harus berformat PDF.',
            'surat_mou.max' => 'Ukuran file surat MoU tidak boleh lebih dari 5 MB.',
            'surat_kak.mimes' => 'Surat KAK harus berformat PDF.',
            'surat_kak.max' => 'Ukuran file surat KAK tidak boleh lebih dari 5 MB.',
        ];
    }
}

