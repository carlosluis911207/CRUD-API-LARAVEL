<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class TagStoreRequest extends FormRequest
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
            'name' => 'required|string|max:255|unique:tags',
            'description' => 'nullable|string|max:255',
            'active' => 'required|boolean',
        ];
    }

    public function failedValidation(Validator $validator)
    {

        $response = [
            'message' => __('messages.error_validation'),
            'errors' => $validator->errors(),
            'code' => 400
        ];

        throw new HttpResponseException(response()->json($response));
    }
}
