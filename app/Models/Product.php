<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    /**
     * Get all of the categories that are assigned this product.
     * 
     * @return array
     */
    public function categories()
    {
        return $this->morphedByMany('App\Models\Category', 'productable');
    }

    /**
     * Get all of the sizes that are assigned this product.
     * 
     * @return array
     */
    public function sizes()
    {
        return $this->morphedByMany('App\Models\Size', 'productable');
    }

    /**
     * Check if this product is available for the size
     * 
     * @return boolean
     */
    public function isAvailableInSize($size_id)
    {
        foreach ($this->sizes as $size) {
            if ($size->id == $size_id && $size->pivot->quantity > 0) {
                return true;
            }
        }

        return false;
    }
}
