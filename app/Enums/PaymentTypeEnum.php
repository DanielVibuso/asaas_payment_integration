<?php

namespace App\Enums;

enum PaymentTypeEnum: String
{
    case PIX = 'PIX';

    case BOLETO = 'BOLETO';

    case CREDIT_CARD = 'CREDIT_CARD';
}
