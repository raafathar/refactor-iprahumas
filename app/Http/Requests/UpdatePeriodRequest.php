<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePeriodRequest extends FormRequest
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
            'name' => 'required|string|max:255|unique:periods,name,' . $this->period->id . ',id',
            'start_date' => 'required|date',
            'end_date' => 'required|date',
            'status' => 'required|in:active,inactive',
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
            'name.required' => 'Nama periode wajib diisi.',
            'name.string' => 'Nama periode harus berupa teks.',
            'name.max' => 'Nama periode tidak boleh lebih dari 255 karakter.',
            'name.unique' => 'Nama periode sudah digunakan.',

            'start_date.required' => 'Tanggal mulai wajib diisi.',
            'start_date.date' => 'Tanggal mulai harus berupa tanggal yang valid.',

            'end_date.required' => 'Tanggal berakhir wajib diisi.',
            'end_date.date' => 'Tanggal berakhir harus berupa tanggal yang valid.',

            'status.required' => 'Status wajib diisi.',
            'status.in' => 'Status harus salah satu dari: active atau inactive.',
        ];
    }
}