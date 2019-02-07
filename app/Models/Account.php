<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\{ User, Billing };
use App\Enums\MorphType;

class Account extends Model
{
    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    /**
     * Get all of the users that are assigned this account.
     * 
     * @return array
     */
    public function users()
    {
        return $this->morphToMany(MorphType::User, 'userable');
    }

    /**
     * Get all of the assets that are assigned this account
     * 
     * @return array
     */
    public function assets()
    {
        return $this->morphMany(MorphType::Asset, 'assetable');
    }

    /**
     * Get all of the account's cards
     * 
     * @return array
     */
    public function cards()
    {
        return $this->morphMany(MorphType::Billing, 'billingable');
    }

    /**
     * Get a default billing
     * 
     * @return Billing
     */
    public function defaultCard()
    {
        foreach ($this->cards as $card) {
            if ($card->is_default) {
                return $card;
            }
        }

        return null;
    }

    /**
     * Get all of the account's charges
     * 
     * @return array
     */
    public function charges()
    {
        return $this->morphMany(MorphType::Charge, 'chargeable');
    }

    /**
     * check if a certain user has a admin role to this account
     * 
     * @param integer $userId
     * @return boolean
     */
    public function hasAdminAccess($userId)
    {
        $user = User::find($userId);
        return $user->hasAdminAccess(MorphType::Account, $this->id);
    }

    /**
     * check if a certain user has read and admin roles to this account
     * 
     * @param integer $userId
     * @return boolean
     */
    public function canRead($userId)
    {
        $user = User::find($userId);
        return $user->canRead(MorphType::Account, $this->id);
    }
}
