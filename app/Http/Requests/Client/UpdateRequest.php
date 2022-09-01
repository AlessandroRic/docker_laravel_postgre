<?php

namespace App\Http\Requests\Client;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
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
            'name' => 'string|min:4',
            'phone' => 'string|min:10',
            'birth_date' => 'date',
        ];
    }

    public function messages()
    {
        return [
            'name' => [
                'Required' => "true",
                'Type'     => 'string',
                'Lenth'    => '100'
            ],
            'phone' => [
                'Required' => "true",
                'Type'     => 'string',
                'Lenth'    => '100'
            ],
            'birth_date' => [
                'Required' => "true",
                'Type'     => 'date',
                'Format'   => 'yyyy-mm-dd'
            ],
        ];
    }

    public function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(
            response()->json([
                'success'         => false,
                'message'         => 'Check fields',
                'validation'      => $validator->errors(),
            ])
        );
    }
}
