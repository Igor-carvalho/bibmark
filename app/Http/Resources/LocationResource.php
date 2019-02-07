<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class LocationResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'location_name' => $this->name,
            'name' => $this->address->name,
            'address_1' => $this->address->address_1,
            'address_2' => $this->address->address_2,
            'city' => $this->address->city,
            'state' => $this->address->state,
            'postal_code' => $this->address->zip,
            'country' => $this->address->country,
            'email' => $this->address->email,
            'phone' => $this->address->phone,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
