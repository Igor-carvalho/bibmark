<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class CharityCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $collection = $this->collection->map(function($charity) {
            return [
                'id' => $charity->id,
                'name' => $charity->name,
                'logo' => $charity->logo,
                'background_image' => $charity->background_image,
                'balance' => number_format($charity->balance, 2),
                'created_at' => $charity->created_at,
                'updated_at' => $charity->updated_at,
            ];
        });

        return [
            'charities' => $collection
        ];
    }
}
