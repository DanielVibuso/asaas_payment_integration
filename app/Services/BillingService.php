<?php

namespace App\Services;

use App\Enums\PaymentTypeEnum;
use App\Gateways\AsaasGateway\AsaasPayment;
use App\Gateways\AsaasGateway\DTO\ChargeRequestDTO;
use App\Repositories\Billing\BillingRepositoryInterface;
use App\Repositories\Customer\CustomerRepositoryInterface;

class BillingService
{
    function __construct(protected BillingRepositoryInterface $billingRepositoryInterface,
                        protected CustomerRepositoryInterface $customerRepositoryInterface)
    {
        
    }

    public function newCharge(array $newCharge): ?array
    {
        $customer = $this->customerRepositoryInterface->find([['cpfCnpj', '=' , $newCharge['cpfCnpjSearch']]]);
        $newCharge['customer'] = $customer->idAsaas;
        $newChargeResponse = AsaasPayment::registerCharge(ChargeRequestDTO::fromArray($newCharge))->toArray(); 

        $newCharge = $this->billingRepositoryInterface->newCharge([
            'customer_id' => $customer->id,
            ...$newChargeResponse
        ]); 

        switch($newCharge->billingType) {
            case PaymentTypeEnum::PIX->value:
                return [
                    'billingType' => PaymentTypeEnum::PIX->value, 
                    'billingData' => AsaasPayment::getPix($newCharge->idAsaas)->toArray()
                ];
                break;
            case PaymentTypeEnum::CREDIT_CARD->value:
                return [
                    'billingType' => PaymentTypeEnum::CREDIT_CARD->value
                ];
                break;
            case PaymentTypeEnum::BOLETO->value:
                return [
                    'billingType' => PaymentTypeEnum::BOLETO->value , 
                    'billingData' => ['bankSlipUrl' => $newCharge['bankSlipUrl'], 
                    ...AsaasPayment::getBoleto($newCharge->idAsaas)->toArray()
                ]
            ];
                break;
            default:
                throw new \Exception('Invalid payment method. Available methods: ' . implode(', ', array_column(PaymentTypeEnum::cases(), 'value')));
        }

    }

}