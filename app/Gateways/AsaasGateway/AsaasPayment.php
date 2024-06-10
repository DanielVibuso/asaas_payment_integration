<?php

namespace App\Gateways\AsaasGateway;

use App\Gateways\AsaasGateway\DTO\ChargeRequestDTO;
use App\Gateways\AsaasGateway\DTO\ChargeResponseDTO;
use App\Gateways\AsaasGateway\DTO\CustomerDTO;
use App\Gateways\AsaasGateway\DTO\GetBoletoResponseDTO;
use App\Gateways\AsaasGateway\DTO\GetPixResponseDTO;
use Illuminate\Http\Client\PendingRequest;
use Illuminate\Support\Facades\Http;

class AsaasPayment
{

    public static function getHttpInstance(): PendingRequest
    {
        return Http::withHeaders([
            'access_token' => config('payment.asaas.api_key'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ])->baseUrl(config('payment.asaas.url'));
    }

    public static function registerCustomer(CustomerDTO $customerDTO){

        return CustomerDTO::fromArray(self::getHttpInstance()->post('customers', $customerDTO->toArray())->throw()->json());        
    }

    public static function registerCharge(ChargeRequestDTO $chargeRequestDTO){
        return ChargeResponseDTO::fromArray(self::getHttpInstance()->post('payments', $chargeRequestDTO->toArray())->throw()->json());        
    }

    public static function getPix(string $paymentId){
        GetPixResponseDTO::fromArray(self::getHttpInstance()->get("payments/{$paymentId}/pixQrCode")->throw()->json());
        return GetPixResponseDTO::fromArray(self::getHttpInstance()->get("payments/{$paymentId}/pixQrCode")->throw()->json());        
    }

    public static function getBoleto(string $paymentId){
        return GetBoletoResponseDTO::fromArray(self::getHttpInstance()->get("payments/{$paymentId}/identificationField")->throw()->json());        
    }

    
}