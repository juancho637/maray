<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePurchaseOrderRequest extends FormRequest
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
        $rules['client_id'] = 'required|exists:clients,id';
        $rules['products'] = 'required|array|min:1';
        $rules['products.product_id'] = 'exists:products,id';

        if ($this->input('type') !== 'quotation') {
            $rules['outstandingBalance'] = 'required|in:0';
        }

        if (!empty($this->input('pet_id'))) {
            $rules['pet_id'] = 'required|exists:pets,id';
        }

        return $rules;
    }
}
