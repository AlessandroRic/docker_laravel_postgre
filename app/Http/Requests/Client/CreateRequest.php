<?php

namespace App\Http\Requests\Client;

use App\Models\Client;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class CreateRequest extends FormRequest
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
        return Client::$rules;
    }

    public function messages()
    {
        return [
            'name.required' => [
                'Required' => "true",
                'Type'     => 'string',
                'Lenth'    => '100'
            ],
            'email.required' => [
                'Required' => "true",
                'Type'     => 'email',
                'Lenth'    => '100'
            ],
            'phone.required' => [
                'Required' => "true",
                'Type'     => 'string',
                'Lenth'    => '100'
            ],
            'document_number.required' => [
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
