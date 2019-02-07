<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class EventCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $collection = $this->collection->map(function($event) {
            return [
                'id' => $event->id,
                'name' => $event->name,
                'rev_share' => number_format($event->rev_share, 2),
                'balance' => number_format($event->balance, 2),
                'created_at' => $event->created_at,
                'updated_at' => $event->updated_at,
            ];
        });

        return [
            'events' => $collection
        ];
    }
}
