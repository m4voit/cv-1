<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class HouseRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'nullable|string',
            'price_from' => 'nullable|numeric',
            'bedroom' => 'nullable|numeric',
            'bathroom' => 'nullable|numeric',
            'storey' => 'nullable|numeric',
            'garage' => 'nullable|numeric'
        ];
    }
}
