<?php

namespace App\Jobs;

use App\Gateways\AsaasGateway\AsaasPayment;
use App\Gateways\AsaasGateway\DTO\CustomerDTO;
use App\Models\Customer;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class CreateCustomerAsaasJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
    public function __construct(protected Customer $customer)
    {
        //
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $this->customer->idAsaas = AsaasPayment::registerCustomer(CustomerDTO::fromModel($this->customer))->id; 
        $this->customer->save();
    }
}
