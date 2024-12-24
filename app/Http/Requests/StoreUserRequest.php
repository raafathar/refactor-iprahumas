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
            'name' => ['required', 'string'],
            'nip' => ['required', 'string', 'min:18'],
            'email' => ['required', 'string', 'email', 'unique:users,email'],
            'phone' => ['required', 'string', 'min:10'],
            'dob' => ['required', 'date'],
            'religion' => ['required', 'string'],
            'position_id' => ['required', 'uuid', 'exists:positions,id'],
            'instance_id' => ['required', 'uuid', 'exists:instances,id'],
            'golongan_id' => ['required', 'uuid', 'exists:golongans,id'],
            'work_unit' => ['required', 'string'],
            'skill_id' => ['required', 'uuid', 'exists:skills,id'],
            'last_education' => ['required', 'string'],
            'last_education_major' => ['required', 'string'],
            'last_education_institution' => ['required', 'string'],
            'province_id' => ['required', 'integer', 'exists:provinces,id'],
            'district_id' => ['required', 'integer', 'exists:districts,id'],
            'subdistrict_id' => ['required', 'integer', 'exists:subdistricts,id'],
            'village_id' => ['required', 'integer', 'exists:villages,id'],
            'address' => ['required', 'string'],
            'profile_picture' => ['required', 'image', 'mimes:jpeg,png,jpg', 'max:1024'],
        ];
    }
}