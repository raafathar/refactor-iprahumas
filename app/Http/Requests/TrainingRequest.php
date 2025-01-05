<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TrainingRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return auth()->user()->role !== "user";
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
                "p_title" => "required|string|max:255",
                "p_content" => "required",
                "p_image" => "mimes:jpeg,png,jpg",
                "p_type_training" => "required|in:offline,online",
                "p_location" => "required",
                "p_start_date" => "required|date",
                "p_end_date" => "required|date",
                "p_forum_scale" => "required|in:internal,eksternal",
                "p_kuota" => "required|integer",
                "p_is_public" => "nullable",
            ];
        }
        return [
            "p_title" => "required|string|max:255",
            "p_content" => "required",
            "p_image" => "required|mimes:jpeg,png,jpg",
            "p_type_training" => "required|in:offline,online",
            "p_location" => "required",
            "p_start_date" => "required|date",
            "p_end_date" => "required|date",
            "p_forum_scale" => "required|in:internal,eksternal",
            "p_kuota" => "required|integer",
            "p_is_public" => "nullable",
        ];
    }
}
