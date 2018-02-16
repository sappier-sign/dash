<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TestTransaction extends FormRequest
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
			'id' => 'bail|required|min:4|alpha_dash|max:20',
			'number' => 'bail|required|min:10|string|max:16',
			'recipient' => 'bail|required_if:action,transfer|min:10|string|max:16',
			'reference' => 'bail|required_if:mode,visa,mastercard|min:12|string|max:20',
			'cvv' => 'bail|required_if:mode,visa,mastercard|min:3|string|max:4',
			'year' => 'bail|required_if:mode,visa,mastercard|min:2|string|max:2',
			'month' => 'bail|required_if:mode,visa,mastercard|min:2|string|max:2',
			'action' => 'bail|required|min:4|alpha|max:10',
			'description' => 'bail|required|min:5|string|max:30',
			'amount' => 'bail|required|numeric|min:0.01|max:9999.99',
			'credit' => 'bail|required_if:action,transfer|numeric|min:0.01|max:9999.99',
			'network' => 'bail|required_if:action,transfer|string|min:3|max:10'
        ];
    }

    public function messages()
	{
		return [
			'id.required' => 'Transaction ID is required',
			'id.min' => 'Transaction ID length must be at least 4',
			'amount.required' => 'Amount is required',
			'credit.required' => 'Credit amount is required',
			'number.required' => 'Wallet number is required',
			'description.required' => 'Description is required',
			'network.required' => 'Recipient\'s network is required',
			'reference.required' => 'Reference is required',
			'month.required' => 'Expiry month is required',
			'year.required' => 'Expiry year is required',
			'cvv.required' => 'CVV is required'
		];
	}
}
