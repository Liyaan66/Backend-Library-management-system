<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateReaderRequest extends FormRequest
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
        $readerId = $this->route('id'); // Get the ID from route

        return [
            'name' => 'sometimes|required|string|max:25',
            'email' => 'sometimes|required|string|email|max:255|unique:readers,email,' . $readerId,
            'gender' => 'sometimes|required|string',
        ];
    }
}
