<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class DesignCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $collection = $this->collection->map(function($design) {
            return [
                'id' => $design->id,
                'name' => $design->name,
                'exported_file' => $design->exported_file,
                'properties' => $design->properties,
                'created_at' => $design->created_at,
                'updated_at' => $design->updated_at,
            ];
        });

        return [
            'designs' => $collection
        ];
    }
}
