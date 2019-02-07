<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Enums\MorphType;

class Design extends Model
{
    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    /**
     * Get all of the charities that are assigned this design.
     */
    public function charities()
    {
        return $this->morphedByMany(MorphType::Charity, 'designable');
    }

    /**
     * Get all of the asset sizes that are assigned this design.
     */
    public function assetSizes()
    {
        return $this->morphedByMany(MorphType::AssetSize, 'designable');
    }
}
