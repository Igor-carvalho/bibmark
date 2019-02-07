<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class AddressCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $collection = $this->collection->map(function($address) {
            return [
                'id' => $address->id,
                'name' => $address->name,
                'address_1' => $address->address_1,
                'address_2' => $address->address_2,
                'city' => $address->city,
                'state' => $address->state,
                'zip' => $address->zip,
                'country' => $address->country,
                'email' => $address->email,
                'phone' => $address->phone,
                'created_at' => $address->created_at,
                'updated_at' => $address->updated_at,
            ];
        });

        return [
            'addresses' => $collection
        ];
    }
}
