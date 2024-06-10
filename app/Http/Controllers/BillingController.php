<?php

namespace App\Http\Controllers;

use App\Http\Requests\Billing\StoreChargeRequest;
use App\Services\BillingService;
use Exception;
use Illuminate\Support\Facades\Log;

class BillingController extends Controller
{
    public function __construct(protected BillingService $billingService){}

    public function newCharge(StoreChargeRequest $storeChargeRequest)
    {
        try{
            return $this->billingService->newCharge($storeChargeRequest->validated());
        }catch(Exception $e)
        {
            Log::info("fatal error: " . $e->getMessage());
            return response()->json(['message' => $e->getMessage()], 500);
        }
    }

}
