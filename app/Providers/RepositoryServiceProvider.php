<?php

namespace App\Providers;

use App\Repositories\Billing\BillingRepository;
use App\Repositories\Billing\BillingRepositoryInterface;
use App\Repositories\Customer\CustomerRepository;
use App\Repositories\Customer\CustomerRepositoryInterface;

class RepositoryServiceProvider extends AppServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(CustomerRepositoryInterface::class, CustomerRepository::class);
        $this->app->bind(BillingRepositoryInterface::class, BillingRepository::class);

    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
