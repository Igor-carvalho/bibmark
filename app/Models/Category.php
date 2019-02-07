<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    /**
     * Get all sub categories
     * 
     * @return array
     */
    public function subCategories()
    {
        $subCategories = Category::where('parent_id', $this->id)->get();

        return $subCategories;
    }

    /**
     * Get parent of this category
     * 
     * @return App\Models\Category
     */
    public function parent()
    {
        $parent = Category::find($this->parent_id);

        return $parent;
    }

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
