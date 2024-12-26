<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BeritaRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return auth()->user()->role != "user";
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            "b_title" => "required|string",
            "b_image" => "image|required|mimes:jpeg,jpg,png,gif|max:10000",
            "b_date" => "required|date",
            "b_is_active" => "required",
            "b_content" => "required"
        ];
    }
}
