<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateTimetableRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'bookkeeper_id' => 'required|exists:book_keepers,id',
            'date' => 'required|date',
            'open_hour' => 'required|date_format:H:i',
            'close_hour' => 'required|date_format:H:i|after:open_hour',
        ];
    }
}
