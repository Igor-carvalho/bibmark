<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class LocationCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $collection = $this->collection->map(function($location) {
            return [
                'id' => $location->id,
                'location_name' => $location->name,
                'name' => $location->address->name,
                'address_1' => $location->address->address_1,
                'address_2' => $location->address->address_2,
                'city' => $location->address->city,
                'state' => $location->address->state,
                'postal_code' => $location->address->zip,
                'country' => $location->address->country,
                'email' => $location->address->email,
                'phone' => $location->address->phone,
                'created_at' => $location->created_at,
                'updated_at' => $location->updated_at,
            ];
        });

        return [
            'locations' => $collection
        ];
    }
}
