<?php

namespace App\Http\Requests\Customer;

use Illuminate\Foundation\Http\FormRequest;

class StoreCustomerRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'required|string|max:255',
            'cpfCnpj' => 'required|string|max:20|unique:customers,cpfCnpj',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:20',
            'mobilePhone' => 'required|string|max:20',
            'address' => 'required|string|max:255',
            'addressNumber' => 'required|string|max:20',
            'complement' => 'required|string|max:255',
            'province' => 'required|string|max:255',
            'postalCode' => 'required|string|max:20',
            'notificationDisabled' => 'required|boolean',
            'additionalEmails' => 'required|string|max:255',
            'municipalInscription' => 'required|string|max:255',
            'stateInscription' => 'required|string|max:255',
            'observations' => 'required|string',
            'groupName' => 'required|string|max:255',
            'company' => 'required|string|max:255',
        ];
    }

    public function messages()
    {
        return [
            'unique' => 'O :attribute informado já foi cadastrado na nossa base e não pode ser duplicado',
            'required' => 'O campo :attribute é obrigatório.',
            'email' => 'O campo :attribute deve ser um endereço de e-mail válido.',
            'boolean' => 'O campo :attribute deve ser verdadeiro ou falso.',
            'string' => 'O campo :attribute deve ser uma string.',
            'max' => 'O campo :attribute não pode ter mais de :max caracteres.',
        ];
    }
}
