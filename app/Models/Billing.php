<?php

namespace App\Models;

use App\Traits\UsesUuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Billing extends Model
{
    use HasFactory;
    use UsesUuid;

    protected $fillable = [
        'idAsaas',
        'customer_id',
        'value',
        'billingType',
        'product',
        'status',
        'dueDate',
        'paymentDate',
        'invoiceUrl',
        'invoiceNumber',
        'bankSlipUrl'
    ];

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }
}
