<?php

namespace App\Http\Requests;

use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Http\FormRequest;

class StoreBiodataRequest extends FormRequest
{
    protected $id;
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
            'nama' => 'required',
            'nim' => 'required|numeric|unique:pengajuans,nim,' . $this->route('id'),
            'jurusan' => 'required',
            'prodi' => 'required',
            'ormawa' => 'required',
            'ketua_ormawa' => 'required',
            'periode' => 'required',
            'telp' => 'required|numeric',
            'email' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'nim.numeric' => 'NIM harus berupa angka.',
            'nim.unique' => 'NIM sudah terdaftar, masukan NIM anda.',
            'telp.numeric' => 'Nomor telepon harus berupa angka.',
        ];
    }

}
