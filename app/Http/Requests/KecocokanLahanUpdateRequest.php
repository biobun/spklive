<?php

namespace App\Http\Requests;

use App\Models\KecocokanLahan;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class KecocokanLahanUpdateRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'value1' => ['Numeric'],
            'value2' => ['Numeric'],
            'value3' => ['Numeric'],
            'value4' => ['Numeric'],
            ];
    }
}
