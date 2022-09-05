<?php

namespace App\Http\Requests\Config;

use App\Models\Config;
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
        return Config::$rules;
    }

    public function messages()
    {
        return [
            'disc_id.required' => [
                "message" => "Disc not found",
                "format" => [
                    'Required' => "true",
                    'Type'     => 'numeric',
                ],
            ]
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
