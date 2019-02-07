<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\{ User, Address};
use App\Enums\MorphType;

class Order extends Model
{
    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    /**
     * Get source address
     * 
     * @return App\Models\Address
     */
    public function source()
    {
        return Address::find($this->source_id);
    }

    /**
     * Get destination address
     * 
     * @return App\Models\Address
     */
    public function destination()
    {
        return Address::find($this->destination_id);
    }

    /**
     * Get order items belong to this order
     * 
     * @return array
     */
    public function orderItems()
    {
        return $this->hasMany(MorphType::OrderItem);
    }

    /**
     * Get a user who ordered
     * 
     * @return App\Models\User
     */
    public function buyer()
    {
        return User::find($this->user_id);
    }
}
