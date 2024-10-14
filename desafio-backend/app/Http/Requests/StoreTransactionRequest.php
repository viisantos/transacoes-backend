<?php

namespace App\Http\Requests;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;

class StoreTransactionRequest extends FormRequest
{
    public function authorize():bool{
        return true;
    }

    public function rules(): array{
        return [
            'transaction_type'        => 'required | string',
            'transaction_description' => 'required | string',
            'transaction_value'       => 'required | numeric',
            'transaction_date'        => 'required | string | date'
        ];
    }

    public function messages()
    {
        return [
            'transaction_type.required' => 'O tipo da transação é obrigatório',
            'transaction_type.string' => 'A descrição deve conter letras',
            'email.required' => 'A descrição da transação deve ser string e é obrigatório o preenchimento',
            'email.email' => 'O valor da transação deve ser numérico',
            'email.unique' => 'A data é obrigatória',
        ];
    }

    public function failedValidation(Validator $validator){
        throw new HttpResponseException(response()->json([
            'success' => false,
            'message' => 'Não foi possível cadastrar. Preencha corretamente os campos.',
            'data'    => $validator->errors()->getMessages()
        ]));
    }
}
