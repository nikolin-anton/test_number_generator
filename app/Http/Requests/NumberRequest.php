<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NumberRequest extends FormRequest
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
            'count' => ['nullable', 'integer'],
        ];
    }

    /**
     * @return NumberRequest
     */
    public function prepareForValidation()
    {
        return $this->merge([
            'count' => request('count') ?? (int) config('app.count')
        ]);
    }
}
