<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Asset extends Model
{
    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    /**
     * Get all of the owning assetable models.
     */
    public function assetable()
    {
        return $this->morphTo();
    }

    /**
     * Get the sizes for the asset.
     */
    public function sizes()
    {
        return $this->hasMany('App\Models\AssetSize');
    }
}
