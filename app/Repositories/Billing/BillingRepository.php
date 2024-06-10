<?php

namespace App\Repositories\Billing;

use App\Models\Billing;


Class BillingRepository implements BillingRepositoryInterface
 {
    public function __construct(protected Billing $billing){}

    public function newCharge(array $chargeData): Billing
    {
        return $this->billing->create($chargeData);
    }
}