<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class OrderCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $collection = $this->collection->map(function($order) {
            return [
                'id' => $order->id,
                'user_id' => $order->user_id,
                'order_number' => $order->order_number,
                'amount_charged' => number_format($order->amount_charged, 2),
                'discount' => number_format($order->discount, 2),
                'coupon_id' => $order->coupon_id,
                'charge_id' => $order->charge_id,
                'status' => $order->status,
                'source_id' => $order->source_id,
                'destination_id' => $order->destination_id,
                'weight' => number_format($order->weight, 2),
                'parcel_id' => $order->parcel_id,
                'easypost_shipment_id' => $order->easypost_shipment_id,
                'shipping_label' => $order->shipping_label,
                'tracking_id' => $order->tracking_id,
                'easypost_tracker' => $order->easypost_tracker,
                'shipping_cost' => $order->shipping_cost,
                'buyer' => $order->buyer(),
                'destination' => $order->destination(),
                'created_at' => $order->created_at,
                'updated_at' => $order->updated_at,
            ];
        });

        return [
            'orders' => $collection
        ];
    }
}
