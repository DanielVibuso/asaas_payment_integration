<?php

namespace App\Repositories\Billing;

use App\Models\Billing;

Interface BillingRepositoryInterface {

    public function newCharge(array $chargeData): Billing;
}