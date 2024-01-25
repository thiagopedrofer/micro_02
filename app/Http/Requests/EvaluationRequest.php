<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EvaluationRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }
    public function rules(): array
    {
        return [
            'company' => ['sometimes'],
            'comment' => ['required', 'min:3', 'max:9999'],
            'stars' => ['required', 'integer', 'min:1', 'max:5']
        ];
    }
}
