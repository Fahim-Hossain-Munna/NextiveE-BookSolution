<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BookRequest extends FormRequest
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
            'title' => 'required|string|max:255',
            'thumbnail' => 'required|image|mimes:jpeg,png,jpg,gif,svg,webp',
            'category_id' => 'nullable',
            'short_description' => 'required',
            'document' => 'required|file|mimes:pdf,epub,mobi,txt',
            'price' => 'nullable|numeric|min:0',
            'status' => 'nullable',
        ];
    }
}
