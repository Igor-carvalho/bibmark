<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

final class OrderStatus extends Enum
{
    const NotPlaced = 0;
    const Placed = 1;
    const Canceled = 2;
    const Shipped = 3;
    const Delivered = 4;
    const Completed = 5;
}
