<?php

namespace App\Services;

use App\Models\Customer;
use App\Repositories\Customer\CustomerRepositoryInterface;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class CustomerService
{
    function __construct(protected CustomerRepositoryInterface $customerRepository)
    {}

    public function store(array $customerData): Customer
    {
        return $this->customerRepository->store($customerData);
    }

    public function index(array $search): LengthAwarePaginator
    {
        return $this->customerRepository->index($search);
    }


}