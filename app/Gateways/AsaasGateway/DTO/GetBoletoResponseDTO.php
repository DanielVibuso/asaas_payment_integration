<?php

namespace App\Gateways\AsaasGateway\DTO;

class GetBoletoResponseDTO extends DTO
{
    public $identificationField;
    public $nossoNumero;
    public $barCode;

    public static function fromArray(array $data)
    {
        $dto = new self();
        collect($data)
        ->each(fn($value, $key) => $dto->$key = $value );
        return $dto;
    }
}