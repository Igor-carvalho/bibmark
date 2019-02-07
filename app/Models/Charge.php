<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Enums\ChargeStatus;

class Charge extends Model
{
    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    /**
     * Get all of the owning chargeable models.
     */
    public function chargeable()
    {
        return $this->morphTo();
    }

    /**
     * charge from the user
     * 
     * @return boolean
     */
    public function charge($billing)
    {
        if ($this->stripe_id) {
            try {
                $stripeCharge = $billing->charge(intval($this->amount * 100));
                $this->transaction_id = $stripeCharge->id;
                $this->status = ChargeStatus::Succeeded;
                $this->save();

                return true;
            } catch (Exception $e) {
                $this->status = ChargeStatus::Failed;
                $this->save();
            }
        }

        return false;
    }
}