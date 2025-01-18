<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateLetterTypeRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
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
            'name' => 'required|string|max:255|unique:letter_types,name,' . $this->letter_type->id . ',id',
            'kode' => 'required|integer|min:1|unique:letter_types,kode,' . $this->letter_type->id . ',id',
        ];
    }

    /**
     * Get custom error messages for validation rules.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'name.required' => 'Keterangan kode wajib diisi.',
            'name.string' => 'Keterangan kode harus berupa teks.',
            'name.max' => 'Keterangan kode tidak boleh lebih dari 255 karakter.',
            'name.unique' => 'Keterangan kode sudah digunakan.',

            'kode.required' => 'Kode jenis surat wajib diisi.',
            'kode.integer' => 'Kode jenis surat harus berupa angka.',
            'kode.min' => 'Kode jenis surat harus minimal 1.',
            'kode.unique' => 'Kode jenis sudah digunakan.',
        ];
    }
}