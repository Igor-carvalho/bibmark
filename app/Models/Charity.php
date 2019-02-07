<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Enums\MorphType;

class Charity extends Model
{
    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    /**
     * Get all of the users that are assigned this charity.
     * 
     * @return array
     */
    public function users()
    {
        return $this->morphToMany(MorphType::Charity, 'userable');
    }

    /**
     * Get all of the designs for the charity.
     */
    public function designs()
    {
        return $this->morphToMany(MorphType::Design, 'designable');
    }

    /**
     * Get all of the order items for the charity.
     */
    public function orderItems()
    {
        return $this->morphToMany(MorphType::OrderItem, 'itemable');
    }

    /**
     * Get all of the order item's pending balances.
     */
    public function pendingBalances()
    {
        return $this->morphMany(MorphType::PendingBalance, 'balanceable');
    }

    /**
     * check if a certain user has a admin role to this charity
     * 
     * @param integer $user_id
     * @return boolean
     */
    public function hasAdminAccess($user_id)
    {
        $user = User::find($user_id);
        return $user->hasAdminAccess(MorphType::Charity, $this->id);
    }

    /**
     * check if a certain user has read and admin roles to this charity
     * 
     * @param integer $user_id
     * @return boolean
     */
    public function canRead($user_id)
    {
        $user = User::find($user_id);
        return $user->canRead(MorphType::Charity, $this->id);
    }
}
