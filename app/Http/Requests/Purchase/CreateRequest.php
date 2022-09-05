<?php

namespace App\Http\Requests\Purchase;

use App\Models\Purchase;
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
        return Purchase::$rules;
    }

    public function messages()
    {
        return [
            'client_id.exists' => [
                "message" => "Client not found",
                "format" => [
                    'Required' => "true",
                    'Type'     => 'numeric',
                ],
            ],
            'disc_id.required' => [
                "message" => "Disc not found",
                "format" => [
                    'Required' => "true",
                    'Type'     => 'numeric',
                ],
            ],
            'amount.required' => [
                'Required' => "true",
                'Type'     => 'numeric'
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
