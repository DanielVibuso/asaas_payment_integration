<?php

namespace App\Gateways\AsaasGateway\DTO;

class CreditCardDTO extends DTO {

    protected ?string $holderName;
    protected ?string $number;
    protected ?string $expiryMonth;
    protected ?string $expiryYear;
    protected ?string $ccv;

    
}