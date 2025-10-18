<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreSeminarRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'title' => 'required|min:3|max:255',
            'description' => 'nullable|string',
            'photo' => 'nullable|image|max:2048',
            'location' => 'nullable|string|max:255',
            'datetime' => 'required|date',
            'type' => 'required|in:skripsi,umum,workshop',
        ];
    }

    public function messages(): array
    {
        return [
            'title.required' => 'Judul seminar wajib diisi',
            'title.min' => 'Judul seminar minimal 3 karakter',
            'datetime.required' => 'Tanggal dan waktu wajib diisi',
            'datetime.date' => 'Format tanggal tidak valid',
            'type.required' => 'Jenis seminar wajib dipilih',
            'type.in' => 'Jenis seminar tidak valid',
            'photo.image' => 'File harus berupa gambar',
            'photo.max' => 'Ukuran gambar maksimal 2MB',
        ];
    }
}