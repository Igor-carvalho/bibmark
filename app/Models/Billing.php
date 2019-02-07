<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Laravel\Cashier\Billable;

class Billing extends Model
{
    use Billable;
    
    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    /**
     * Get all of the owning billingable models.
     */
    public function billingable()
    {
        return $this->morphTo();
    }
}
