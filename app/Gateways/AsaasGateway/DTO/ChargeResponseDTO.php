<?php
namespace App\Gateways\AsaasGateway\DTO;

class ChargeResponseDTO extends DTO {

    protected ?string $object;
    protected ?string $id;
    protected ?string $idAsaas;
    protected ?string $dateCreated;
    protected ?string $customer;
    protected ?string $paymentLink;
    protected ?float $value;
    protected ?float $netValue;
    protected ?float $originalValue;
    protected ?float $interestValue;
    protected ?string $description;
    protected ?string $billingType;
    protected ?bool $canBePaidAfterDueDate;
    protected ?string $pixTransaction;
    protected ?string $status;
    protected ?string $dueDate;
    protected ?string $originalDueDate;
    protected ?string $paymentDate;
    protected ?string $clientPaymentDate;
    protected ?int $installmentNumber;
    protected ?string $invoiceUrl;
    protected ?string $invoiceNumber;
    protected ?string $externalReference;
    protected ?bool $deleted;
    protected ?bool $anticipated;
    protected ?bool $anticipable;
    protected ?string $creditDate;
    protected ?string $estimatedCreditDate;
    protected ?string $transactionReceiptUrl;
    protected ?string $nossoNumero;
    protected ?string $bankSlipUrl;
    protected ?string $lastInvoiceViewedDate;
    protected ?string $lastBankSlipViewedDate;


    public static function fromArray(array $data)
    {
        $dto = new self();
        collect($data)
        ->each(fn($value, $key) => $dto->$key = $value );  
        $dto->idAsaas = $data['id'];
        $dto->bankSlipUrl = $data['bankSlipUrl'];
        return $dto;
    }

}