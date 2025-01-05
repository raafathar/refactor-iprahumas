<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateAccountSettingRequest extends FormRequest
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
        $rules = [
            'name' => 'required|string|max:255',
            'email' => 'required|email|string|max:255|unique:users,email,' . $this->account_setting->id,
            'profile_picture' => 'nullable|image|mimes:jpeg,png,jpg|max:1024',
            'current_password' => ['required', 'string'],
            'password' => ['nullable', 'string', 'confirmed', 'min:8'],
            'password_confirmation' => ['nullable', 'string', 'required_with:password'],
        ];

        if ($this->account_setting->role === 'user') {
            $rules = array_merge($rules, [
                'nip' => 'required|string|min:18|unique:forms,nip,'
                    . $this->account_setting->id . ',user_id',
                'phone' => 'required|string|min:10|max:15|unique:forms,phone,' . $this->account_setting->id . ',user_id',
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
                'subdistrict_id' => 'required|exists:subdistricts,id',
                'village_id' => 'required|exists:villages,id',
                'address' => 'required|string',
            ]);
        }

        return $rules;
    }

    /**
     * Get custom error messages for validation rules.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'name.required' => 'Nama wajib diisi.',
            'name.string' => 'Nama harus berupa teks.',
            'name.max' => 'Nama tidak boleh lebih dari 255 karakter.',

            'nip.required' => 'NIP wajib diisi.',
            'nip.string' => 'NIP harus berupa teks.',
            'nip.min' => 'NIP harus minimal 18 karakter.',
            'nip.unique' => 'NIP sudah terdaftar.',

            'email.required' => 'Email wajib diisi.',
            'email.email' => 'Email harus berupa format email yang valid.',
            'email.string' => 'Email harus berupa teks.',
            'email.max' => 'Email tidak boleh lebih dari 255 karakter.',
            'email.unique' => 'Email sudah terdaftar.',

            'phone.required' => 'Nomor WA wajib diisi.',
            'phone.string' => 'Nomor WA harus berupa teks.',
            'phone.min' => 'Nomor WA harus minimal 10 karakter.',
            'phone.max' => 'Nomor WA tidak boleh lebih dari 15 karakter.',
            'phone.unique' => 'Nomor WA sudah terdaftar.',

            'dob.required' => 'Tanggal lahir wajib diisi.',
            'dob.date' => 'Tanggal lahir harus berupa format tanggal yang valid.',

            'religion.required' => 'Agama wajib diisi.',
            'religion.string' => 'Agama harus berupa teks.',

            'position_id.required' => 'Jabatan wajib diisi.',
            'position_id.exists' => 'Jabatan tidak ditemukan.',

            'instance_id.required' => 'Instansi wajib diisi.',
            'instance_id.exists' => 'Instansi tidak ditemukan.',

            'golongan_id.required' => 'Pangkat/Golongan wajib diisi.',
            'golongan_id.exists' => 'Pangkat/Golongan tidak ditemukan.',

            'work_unit.required' => 'Unit kerja wajib diisi.',
            'work_unit.string' => 'Unit kerja harus berupa teks.',

            'skill_id.required' => 'Keahlian wajib diisi.',
            'skill_id.exists' => 'Keahlian tidak ditemukan.',

            'last_education.required' => 'Pendidikan terakhir wajib diisi.',
            'last_education.string' => 'Pendidikan terakhir harus berupa teks.',

            'last_education_major.required' => 'Jurusan pendidikan terakhir wajib diisi.',
            'last_education_major.string' => 'Jurusan pendidikan terakhir harus berupa teks.',

            'last_education_institution.required' => 'Universitas wajib diisi.',
            'last_education_institution.string' => 'Universitas harus berupa teks.',

            'province_id.required' => 'Provinsi wajib diisi.',
            'province_id.exists' => 'Provinsi tidak ditemukan.',

            'district_id.required' => 'Kabupaten wajib diisi.',
            'district_id.exists' => 'Kabupaten tidak ditemukan.',

            'subdistrict_id.required' => 'Kecamatan wajib diisi.',
            'subdistrict_id.exists' => 'Kecamatan tidak ditemukan.',

            'village_id.required' => 'Kelurahan wajib diisi.',
            'village_id.exists' => 'Kelurahan tidak ditemukan.',

            'address.required' => 'Alamat wajib diisi.',
            'address.string' => 'Alamat harus berupa teks.',

            'profile_picture.image' => 'Foto resmi harus berupa gambar.',
            'profile_picture.mimes' => 'Foto resmi harus dalam format jpeg, png, atau jpg.',
            'profile_picture.max' => 'Ukuran foto resmi tidak boleh lebih dari 1MB.',

            'current_password.required' => 'Kata sandi saat ini wajib diisi.',
            'current_password.string' => 'Kata sandi saat ini harus berupa teks.',

            'password.nullable' => 'Kata sandi baru tidak wajib diisi.',
            'password.string' => 'Kata sandi baru harus berupa teks.',
            'password.confirmed' => 'Kata sandi baru dan konfirmasi kata sandi tidak cocok.',
            'password.min' => 'Kata sandi baru harus minimal 8 karakter.',

            'password_confirmation.required_with' => 'Konfirmasi kata sandi wajib diisi jika kata sandi baru diisi.',
            'password_confirmation.string' => 'Konfirmasi kata sandi harus berupa teks.',
        ];
    }
}
