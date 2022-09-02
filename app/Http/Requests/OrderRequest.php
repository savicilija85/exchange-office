<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OrderRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'code' => 'required|string|size:3',
            'rate' => 'required|numeric',
            'surcharge_percentage' => 'required|numeric',
            'surcharge_amount' => 'required|numeric',
            'amount_purchased' => 'required|numeric',
            'amount_paid' => 'required|numeric|gt:0'
        ];
    }
}
