<?php

namespace App\Gateways\AsaasGateway\DTO;

class CreditCardHolderInfoDTO extends DTO {

    protected ?string $name;
    protected ?string $email;
    protected ?string $cpfCnpj;
    protected ?string $postalCode;
    protected ?string $addressNumber;
    protected ?string $addressComplement;
    protected ?string $phone;
    protected ?string $mobilePhone;
    
}