<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BannerRequest extends FormRequest
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
        if ($this->method() == "PUT") {
            return [
                "b_title" => "required|max:30",
                "b_image" => "mimes:jpeg,png,jpg",
                "b_is_active"
            ];
        }
        return [
            "b_title" => "required|max:30",
            "b_image" => "required|mimes:jpeg,png,jpg",
            "b_is_active"
        ];
    }
}
