<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    /**
     * Check if this coupon is valid
     * 
     * @return boolean
     */
    public function valid()
    {

    }

    /**
     * Calculate a discount
     * 
     * @param float $amount
     * @return float
     */
    public function discount($amount)
    {

    }
}
