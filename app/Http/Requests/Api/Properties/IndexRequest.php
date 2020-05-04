<?php

namespace App\Http\Requests\Api\Properties;

use Illuminate\Foundation\Http\FormRequest;

class IndexRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => [
                'sometimes',
                'string',
            ],
            'bedrooms' => [
                'sometimes',
                'integer',
                'min:1',
            ],
            'bathrooms' => [
                'sometimes',
                'integer',
                'min:1',
            ],
            'storeys' => [
                'sometimes',
                'integer',
                'min:1',
            ],
            'garages' => [
                'sometimes',
                'integer',
                'min:1',
            ],
            'price_from' => [
                'sometimes',
                'integer',
                'min:0',
            ],
            'price_to' => [
                'sometimes',
                'integer',
                'min:0',
            ],
        ];
    }
}
