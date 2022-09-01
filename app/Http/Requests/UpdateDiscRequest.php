<?php

namespace App\Http\Requests;

use App\Models\Disc;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class UpdateDiscRequest extends FormRequest
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
            'amount' => 'required|numeric',
        ];
    }

    public function messages()
    {
        return [
            'amount' => [
                'Required' => "true",
                'Type'     => 'numeric'
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
