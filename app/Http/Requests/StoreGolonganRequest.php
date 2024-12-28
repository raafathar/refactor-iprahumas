<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreGolonganRequest extends FormRequest
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
            'name' => 'required|string|max:255|unique:golongans,name',
            'sort_order' => 'required|integer|min:1|unique:golongans,sort_order',
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
            'name.required' => 'Nama pangkat/golongan wajib diisi.',
            'name.string' => 'Nama pangkat/golongan harus berupa teks.',
            'name.max' => 'Nama pangkat/golongan tidak boleh lebih dari 255 karakter.',
            'name.unique' => 'Nama pangkat/golongan sudah digunakan.',

            'sort_order.required' => 'Urutan wajib diisi.',
            'sort_order.integer' => 'Urutan harus berupa angka.',
            'sort_order.min' => 'Urutan harus minimal 1.',
            'sort_order.unique' => 'Urutan sudah digunakan.',
        ];
    }
}