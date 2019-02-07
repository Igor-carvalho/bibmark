<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

final class ChargeStatus extends Enum
{
    const NotYet = 0;
    const Succeeded = 1;
    const Failed = -1;
}
