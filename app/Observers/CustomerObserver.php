<?php

namespace App\Observers;

use App\Jobs\CreateCustomerAsaasJob;
use App\Models\Customer;

class CustomerObserver
{
    public function created(Customer $customer)
    {
        CreateCustomerAsaasJob::dispatch($customer);
    }
}
