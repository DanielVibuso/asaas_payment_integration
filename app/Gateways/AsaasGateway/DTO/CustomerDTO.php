<?php
namespace App\Gateways\AsaasGateway\DTO;

use App\Models\Customer;
use Illuminate\Support\Arr;

class CustomerDTO extends DTO {

    protected ?string $id;
    protected string $name;
    protected string $cpfCnpj;
    protected string $email;
    protected string $phone;
    protected string $mobilePhone;
    protected string $address;
    protected string $addressNumber;
    protected string $complement;
    protected string $province;
    protected string $postalCode;
    protected string $notificationDisabled;
    protected string $additionalEmails;
    protected string $municipalInscription;
    protected string $stateInscription;
    protected string $observations;
    protected string $groupName;
    protected string $company;


    public static function fromModel(Customer $model)
    {
        $dto = new self();
        collect(Arr::except($model->toArray(), ['id']))
        ->each(fn($value, $key) => $dto->$key = $value );  

        return $dto;
    }

    public static function fromArray(array $data)
    {
        $dto = new self();
        collect($data)
        ->each(fn($value, $key) => $dto->$key = $value );
        return $dto;
    }
}