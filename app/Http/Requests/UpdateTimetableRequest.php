<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateTimetableRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'bookkeeper_id' => 'sometimes|required|exists:book_keepers,id',
            'date' => 'sometimes|required|date',
            'open_hour' => 'sometimes|required|date_format:H:i',
            'close_hour' => 'sometimes|required|date_format:H:i|after:open_hour',
        ];
    }
}
