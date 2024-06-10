<?php

namespace App\Gateways\AsaasGateway\DTO;

class GetPixResponseDTO extends DTO
{
    protected ?string $success;
    protected ?string $encodedImage;
    protected ?string $payload;
    protected ?string $expirationDate;

    public static function fromArray(array $data)
    {
        $dto = new self();
        collect($data)
        ->each(fn($value, $key) => $dto->$key = $value );
        return $dto;
    }
}