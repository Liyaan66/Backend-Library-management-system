<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateBorrowBookRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
         return [
            'book_id' => 'sometimes|exists:books,id',
            'reader_id' => 'sometimes|exists:readers,id',
            'borrowed_at' => 'sometimes|date',
            'due_date' => 'sometimes|date|after:borrowed_at',
        ];
    }
}
