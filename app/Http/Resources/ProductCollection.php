<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class ProductCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $collection = $this->collection->map(function($product) {
            return [
                'id' => $product->id,
                'name' => $product->name,
                'description' => $product->description,
                'price' => number_format($product->price, 2),
                'slug' => $product->slug,
                'image' => $product->image,
                'data' => $product->data,
                'is_available' => $product->is_available,
                'created_at' => $product->created_at,
                'updated_at' => $product->updated_at,
            ];
        });

        return [
            'products' => $collection
        ];
    }
}
