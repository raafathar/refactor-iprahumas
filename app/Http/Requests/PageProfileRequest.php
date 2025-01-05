<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class PageProfileRequest extends FormRequest
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
                "p_title" => [
                    "required",
                    "string",
                    "unique" => Rule::unique("page_profiles", "p_title")->ignore($this->route()->beritum)
                ],
                "p_image" => "image|mimes:jpeg,jpg,png,gif|max:10000",
                "p_is_active" => "nullable",
                "p_content" => "required"
            ];
        }
        return [
            "p_title" => "required|string|unique:page_profiles,p_title",
            "p_image" => "image|required|mimes:jpeg,jpg,png,gif|max:10000",
            "p_is_active" => "nullable",
            "p_content" => "required"
        ];
    }
}
