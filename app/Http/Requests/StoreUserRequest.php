<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
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
            'name' => 'required|string|max:255',
            'nip' => 'required|string|min:18|unique:forms,nip',
            'email' => 'required|email|string|max:255|unique:users,email',
            'phone' => 'required|string|min:10|max:15|unique:forms,phone',
            'dob' => 'required|date',
            'religion' => 'required|string',
            'position_id' => 'required|exists:positions,id',
            'instance_id' => 'required|exists:instances,id',
            'golongan_id' => 'required|exists:golongans,id',
            'work_unit' => 'required|string',
            'skill_id' => 'required|exists:skills,id',
            'last_education' => 'required|string',
            'last_education_major' => 'required|string',
            'last_education_institution' => 'required|string',
            'province_id' => 'required|exists:provinces,id',
            'district_id' => 'required|exists:districts,id',
            'subdistrict_id' => 'required|exists:districts,id',
            'village_id' => 'required|exists:villages,id',
            'address' => 'required|string',
            'profile_picture' => 'required|image|mimes:jpeg,png,jpg|max:1024',
        ];
    }
}
