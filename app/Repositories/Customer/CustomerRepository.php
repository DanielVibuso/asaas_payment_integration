<?php

namespace App\Repositories\Customer;

use App\Models\Customer;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

Class CustomerRepository implements CustomerRepositoryInterface
 {
    public function __construct(protected Customer $customer){}

    public function store($customerData): Customer
    {
        return $this->customer->create($customerData);
    }

    public function find($search): Customer
    {
        return $this->customer->where($search)->first();
    }

    public function index(array $search): LengthAwarePaginator
    {
        return $this->customer->paginate(15);
    }
}