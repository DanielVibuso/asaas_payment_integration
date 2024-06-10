<?php
namespace App\Gateways\AsaasGateway\DTO;

use App\Models\Billing;
use Illuminate\Support\Arr;

class ChargeRequestDTO extends DTO {

    protected ?string $id;
    protected ?string $idAsaas;
    protected ?string $customer;
    protected ?string $billingType;
    protected ?float $value;
    protected ?string $dueDate;
    protected ?string $paymentDate;
    protected ?string $status;
    protected ?string $invoiceUrl;
    protected ?string $invoiceNumber;
    protected ?CreditCardDTO $creditCard;
    protected ?CreditCardHolderInfoDTO $creditCardHolderInfo;

    public function toArray()
    {
        return array_map(function($attribute){
            if (is_object($attribute) && method_exists($attribute, 'toArray')) {
                return $attribute->toArray();
            }
            return $attribute;
        }, get_object_vars($this));
    }

    public static function fromArray(array $data)
    {
        $dto = new self();
        collect(Arr::except($data,['creditCard', 'creditCardHolderInfo']))
        ->each(fn($value, $key) => $dto->$key = $value );  

        if (isset($data['creditCard'])) {
            $dto->creditCard = CreditCardDTO::fromArray($data['creditCard']);
        }

        if (isset($data['creditCardHolderInfo'])) {
            $dto->creditCardHolderInfo = CreditCardHolderInfoDTO::fromArray($data['creditCardHolderInfo']);
        }

        return $dto;
    }
    
}