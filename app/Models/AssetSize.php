<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Enums\MorphType;

class AssetSize extends Model
{
    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    /**
     * Get all of the designs for the asset size.
     */
    public function designs()
    {
        return $this->morphToMany(MorphType::Design, 'designable');
    }

    /**
     * Get all of the order items for the asset size.
     */
    public function orderItems()
    {
        return $this->morphToMany(MorphType::OrderItem, 'itemable');
    }
}
