<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
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
        // dd($this->all());
        if ($this->method() == "PUT") {
            return [
                "b_title" => [
                    "required",
                    "string",
                    "unique" => Rule::unique("beritas", "b_title")->ignore($this->route()->beritum)
                ],
                "b_image" => "image|mimes:jpeg,jpg,png,gif|max:10000",
                "b_date" => "required|date",
                "b_is_active" => "nullable",
                "b_content" => "required"
            ];
        }
        return [
            "b_title" => "required|string|unique:beritas,b_title",
            "b_image" => "image|required|mimes:jpeg,jpg,png,gif|max:10000",
            "b_date" => "required|date",
            "b_is_active" => "nullable",
            "b_content" => "required"
        ];
    }
}
