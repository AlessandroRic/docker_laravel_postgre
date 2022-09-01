<?php

namespace App\Http\Requests;

use App\Models\Disc;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class CreateDiscRequest extends FormRequest
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
        return Disc::$rules;
    }

    public function messages()
    {
        return [
            'name.required' => [
                'Required' => "true",
                'Type'     => 'string',
                'Lenth'    => '100'
            ],
            'artist.required' => [
                'Required' => "true",
                'Type'     => 'string',
                'Lenth'    => '100'
            ],
            'stile.required' => [
                'Required' => "true",
                'Type'     => 'string',
                'Lenth'    => '100'
            ],
            'amount' => [
                'Required' => "true",
                'Type'     => 'numeric'
            ],
            'released_at' => [
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
