<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class OrderItemCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $collection = $this->collection->map(function($orderItem) {
            return [
                'id' => $orderItem->id,
                'order_id' => $orderItem->order_id,
                'product_id' => $orderItem->product_id,
                'size_id' => $orderItem->size_id,
                'design_id' => $orderItem->design_id,
                'event_registration_id' => $orderItem->event_registration_id,
                'quantity' => $orderItem->quantity,
                'price' => number_format($orderItem->price, 2),
                'created_at' => $orderItem->created_at,
                'updated_at' => $orderItem->updated_at,
            ];
        });

        return [
            'order_items' => $collection
        ];
    }
}
