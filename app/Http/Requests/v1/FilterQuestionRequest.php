<?php

namespace App\Http\Requests\v1;

use App\Enums\ExamType;
use App\Http\Requests\Request;
use Illuminate\Validation\Rule;

class FilterQuestionRequest extends Request
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
            'exam' => ['nullable', 'string', Rule::enum(ExamType::class)],
        ];
    }
}
