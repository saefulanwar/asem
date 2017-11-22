<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PaymentProofRequest extends FormRequest
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

  
    public function rules()
    {
        return [
            'file' => 'required|max:1020|mimes:jpg,jpeg,png'
        ];
    }

    public function messages()
    {
        return [
            // 'file.required' => 'Payment proof is required',
            // 'file.max' => 'Max size: 2mb',
            ];
    }
}
