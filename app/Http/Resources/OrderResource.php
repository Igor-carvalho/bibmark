<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class OrderResource extends JsonResource
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
            'user_id' => $this->user_id,
            'order_number' => $this->order_number,
            'amount_charged' => number_format($this->amount_charged, 2),
            'discount' => number_format($this->discount, 2),
            'coupon_id' => $this->coupon_id,
            'charge_id' => $this->charge_id,
            'status' => $this->status,
            'source_id' => $this->source_id,
            'destination_id' => $this->destination_id,
            'weight' => number_format($this->weight, 2),
            'parcel_id' => $this->parcel_id,
            'easypost_shipment_id' => $this->easypost_shipment_id,
            'shipping_label' => $this->shipping_label,
            'tracking_id' => $this->tracking_id,
            'easypost_tracker' => $this->easypost_tracker,
            'shipping_cost' => $this->shipping_cost,
            'buyer' => $this->buyer(),
            'destination' => $this->destination(),
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
