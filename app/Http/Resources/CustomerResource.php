<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CustomerResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray($request)
    {
        return [
            'data' => [
                'nome' => $this->name,
                'cpfCnpj' => $this->cpfCnpj,
                'email' => $this->email,
                'telefone' => $this->phone,
                'celular' => $this->mobilePhone,
                'endereco' => $this->address,
                'numero' => $this->addressNumber,
                'complemento' => $this->complement,
                'bairro' => $this->province,
                'cep' => $this->postalCode,
                'notificacaoDesativada' => $this->notificationDisabled,
                'emailsAdicionais' => $this->additionalEmails,
                'inscricaoMunicipal' => $this->municipalInscription,
                'inscricaoEstadual' => $this->stateInscription,
                'observacoes' => $this->observations,
                'nomeGrupo' => $this->groupName,
                'empresa' => $this->company,
                'id' => $this->id,
                'cobrancas' => $this->billings ?? [],
            ]
        ];
    }
}
