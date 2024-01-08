<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BookUpdateRequest extends FormRequest
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
        // https://laravel.com/docs/10.x/validation#available-validation-rules
        return [
            'title' =>'string|max:100',
            'pages' =>'integer',
            'ISBN' =>'string|max:20',
            'year' =>'integer',
            'category_id' =>'integer|exists:categories,id',
        ];
    }
}
