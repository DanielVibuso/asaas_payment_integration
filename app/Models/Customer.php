<?php

namespace App\Models;

use App\Traits\UsesUuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;
    use UsesUuid;

    protected $fillable = [
        'name',
        'cpfCnpj',
        'email',
        'phone',
        'mobilePhone',
        'address',
        'addressNumber',
        'complement',
        'province',
        'postalCode',
        'notificationDisabled',
        'additionalEmails',
        'municipalInscription',
        'stateInscription',
        'observations',
        'groupName',
        'company',
    ];

    public function billings()
    {
        return $this->hasMany(Billing::class);
    }
}
