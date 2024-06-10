<?php

namespace App\Gateways\AsaasGateway\DTO;

class DTO {

    public function __get($property)
    {
        if (!property_exists($this, $property)) {
            return null;
        }

        return $this->$property;
    }

    public function __set($property, $value)
    {
        if (property_exists($this, $property)) {
            $this->$property = $value;
        }
    }

    public function toArray()
    {
        return get_object_vars($this);
    }

    public static function fromArray(array $data)
    {
        $dto = new self();
        collect($data)
        ->each(fn($value, $key) => $dto->$key = $value );
        return $dto;
    }

}