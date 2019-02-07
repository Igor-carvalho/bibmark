<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class BillingCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $collection = $this->collection->map(function($billing) {
            return [
                'id' => $this->id,
                'name' => $this->name,
                'address' => $this->address,
                'city' => $this->city,
                'state' => $this->state,
                'country' => $this->country,
                'zip' => $this->zip,
                'stripe_id' => $this->stripe_id,
                'card_brand' => $this->card_brand,
                'card_last_four' => $this->card_last_four,
                'trial_ends_at' => $this->trial_ends_at,
                'created_at' => $this->created_at,
                'updated_at' => $this->updated_at,
            ];
        });

        return [
            'billings' => $collection
        ];
    }
}
