<?php

namespace App\Http\Requests\Billing;

use App\Enums\PaymentTypeEnum;
use App\Enums\ProductTypeEnum;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Enum;
use Illuminate\Validation\Rules\Exists;

class StoreChargeRequest extends FormRequest
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
    public function rules()
    {
        $rules = [
            'cpfCnpjSearch' => ['required', 'exists:customers,cpfCnpj'],
            'billingType' => ['required', new Enum(PaymentTypeEnum::class)],
            'product' => ['required', new Enum(ProductTypeEnum::class)],
            'value' => ['required','numeric','min:1'],
            'dueDate' => ['required', 'date', 'after_or_equal:today'],
        ];

        if ($this->input('billingType') === 'credit_card') {
            $rules = array_merge($rules, [
                'creditCard.holderName' => ['required', 'string'],
                'creditCard.number' => ['required', 'string', 'size:16'],
                'creditCard.expiryMonth' => ['required', 'string', 'size:2'],
                'creditCard.expiryYear' => ['required', 'string', 'size:4'],
                'creditCard.ccv' => ['required', 'string', 'size:3'],
                'creditCardHolderInfo.name' => ['required', 'string'],
                'creditCardHolderInfo.email' => ['required', 'email'],
                'creditCardHolderInfo.cpfCnpj' => ['required', 'string'],
                'creditCardHolderInfo.postalCode' => ['required', 'string'],
                'creditCardHolderInfo.addressNumber' => ['required', 'string'],
                'creditCardHolderInfo.addressComplement' => ['nullable', 'string'],
            ]);
        }

        return $rules;
    }

    public function messages()
    {
        return [
            'product.Illuminate\Validation\Rules\Enum' => 'O valor fornecido para o campo produto não é válido. Valores validos: BASICO, PREMIUM, PRESIDENCIAL',
            'unique' => 'O :attribute informado já foi cadastrado na nossa base e não pode ser duplicado',
            'required' => 'O campo :attribute é obrigatório.',
            'email' => 'O campo :attribute deve ser um endereço de e-mail válido.',
            'boolean' => 'O campo :attribute deve ser verdadeiro ou falso.',
            'string' => 'O campo :attribute deve ser uma string.',
            'max' => 'O campo :attribute não pode ter mais de :max caracteres.',
            'date' => 'O campo :attribute deve ser do tipo data.',
            'after_or_equal' => 'O campo :attribute deve ser maior ou igual a hoje.',
            'exists' => 'O cliente com o cnpf/cnpj informado não foi encontrado na base de dados'
        ];
    }
}
