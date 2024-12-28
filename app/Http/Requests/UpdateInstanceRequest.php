<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateInstanceRequest extends FormRequest
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
            'name' => 'required|string|max:255|unique:instances,name,' . $this->instance->id . ',id',
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
            'name.required' => 'Nama instansi wajib diisi.',
            'name.string' => 'Nama instansi harus berupa teks.',
            'name.max' => 'Nama instansi tidak boleh lebih dari 255 karakter.',
            'name.unique' => 'Nama instansi sudah digunakan.',
        ];
    }
}