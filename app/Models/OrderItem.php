<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Enums\MorphType;

class OrderItem extends Model
{
    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    /**
     * Get all of the charities that are assigned this order item.
     */
    public function charities()
    {
        return $this->morphedByMany(MorphType::Charity, 'itemable');
    }

    /**
     * Get all of the asset sizes that are assigned this order item.
     */
    public function assetSizes()
    {
        return $this->morphedByMany(MorphType::AssetSize, 'itemable');
    }
}
