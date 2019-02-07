<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

final class MorphType extends Enum
{
    const Account = 'App\Models\Account';
    const Charity = 'App\Models\Charity';
    const Event = 'App\Models\Event';
    const User = 'App\Models\User';
    const Asset = 'App\Models\Asset';
    const Billing = 'App\Models\Billing';
    const Charge = 'App\Models\Charge';
    const AssetSize = 'App\Models\AssetSize';
    const Design = 'App\Models\Design';
    const OrderItem = 'App\Models\OrderItem';
    const PendingBalance = 'App\Models\PendingBalance';
}
