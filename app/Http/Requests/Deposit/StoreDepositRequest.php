<?php

namespace App\Http\Requests\Deposit;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Validation\ValidationException;

class StoreDepositRequest extends FormRequest
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
            $this->user_id => ['required', 'numeric', 'exists:users,id'],
            $this->wallet_id => ['required', 'numeric', 'exists:wallets,id'],
            $this->amount => ['required'],
            // $this->percent => ['required'],
            // $this->active => ['required'],
            // $this->duration => ['required'],
            // $this->accrue_times => ['required'],
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        if ($this->expectsJson()) {
            $errors = (new ValidationException($validator))->errors();
            throw new HttpResponseException(
                response()->json(['success' => false, 'errors' => $errors], 422)
            );
        }

        parent::failedValidation($validator);
    }
}
