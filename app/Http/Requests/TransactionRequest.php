<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TransactionRequest extends FormRequest
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
            'book_id' => 'required|exists:books,id',
            'full_name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'card_number' => 'required|integer',
            'expiry' => 'nullable|date_format:m/y',
            'cvc' => 'nullable|integer',
        ];
    }
}
