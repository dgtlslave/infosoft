<?php

namespace App\Http\Requests\Replanishment;

use Illuminate\Foundation\Http\FormRequest;

class StoreReplanishmentRequest extends FormRequest
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
        $rules = [];

        $rules['deposit_id'] = ['required', 'exists:deposits,id'];
        $rules['replenish_amount'] = ['required'];

        return $rules;
    }
}
