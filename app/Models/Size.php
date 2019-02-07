<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Size extends Model
{
    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    /**
     * Get all of the products that are assigned this category.
     * 
     * @return array
     */
    public function products()
    {
        return $this->morphedByMany('App\Models\Product', 'productable');
    }
}
