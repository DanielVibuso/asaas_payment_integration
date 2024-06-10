<?php

namespace App\Repositories\Customer;

use App\Models\Customer;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;


Interface CustomerRepositoryInterface {

    public function store(array $customer): Customer;

    public function find(array $search): Customer;

    public function index(array $search): LengthAwarePaginator;
}