<?php

namespace App\Http\Requests;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;

class UpdateTransactionRequest extends FormRequest
{
    public function authorize():bool{
        return true;
    }

    public function rules(): array{
        return [
            'transaction_type'        => 'required|string',
            'transaction_description' => 'required|string',
            'transaction_value'       => 'required|numeric',
            'transaction_date'        => 'required|string|date'
        ];
    }
    public function messages()
    {
        return [
            'transaction_type.required' => 'O tipo da transação é obrigatório',
            'transaction_description.required' => 'A descrição da transação é obrigatória',
            'transaction_description.string' => 'A descrição da transação deve conter letras',
            'transaction_value.numeric' => 'O valor da transação deve ser numérico',
            'transaction_value.required' => 'O valor da transação deve ser obrigatório',
            'transaction_date.required' => 'A data da transação deve ser obrigatória'
        ];
    }

    public function failedValidation(Validator $validator){
        throw new HttpResponseException(response()->json([
            'success' => false,
            'message' => 'Não foi possível Atualizar. Preencha corretamente os campos.',
            'data'    => $validator->errors()->getMessages()
        ]));
    }
}
