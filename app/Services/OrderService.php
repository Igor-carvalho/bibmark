<?php

namespace App\Services;

use Illuminate\Support\Facades\Auth; 
use App\Models\{ Order, OrderItem, Product, Coupon, Billing, Charge };
use App\Enums\{ OrderStatus, ChargeStatus };

class OrderService
{
    /**
     * Get all orders
     * 
     * @return array
     */
    public function getAllOrders()
    {
        return Order::all();
    }

    /**
     * Create or Update an order item
     * 
     * @param array $data
     * @return App\Models\OrderItem
     */
    public function createOrUpdateOrderItem($data)
    {
        $order = null;
        if (empty($data['order_id'])) {
            $user = Auth::user();
            $values = [
                'user_id' => $user->id
            ];
            if (!empty($user->address_id)) {
                $values['destination_id'] = $user->address_id;
            }
            $order = Order::create($values);
            $order->order_number = strrev(date('Y', strtotime('now'))) . strrev(date('md', strtotime('now'))) . $order->id;
            $order->save();
        } else {
            $order = Order::find($data['order_id']);
        }
        if ($order) {
            foreach ($order->orderItems as $orderItem) {
                if ($orderItem->product_id == $data['product_id'] && $orderItem->size_id == $data['size_id'] && $orderItem->design_id == $data['design_id']) {
                    $orderItem->quantity = $data['quantity'];
                    $orderItem->save();

                    return $orderItem;
                }
            }
            $orderItem = $order->orderItems()->create([
                'order_id' => $order->id,
                'product_id' => $data['product_id'],
                'size_id' => $data['size_id'],
                'design_id' => $data['design_id'],
                'event_registration_id' => $data['event_registration_id'],
                'quantity' => $data['quantity'],
                'price' => Product::find($data['product_id'])->price
            ]);

            $design = Design::find($orderItem->design_id);
            if (count($design->charities) > 0) {
                $orderItem->charities()->saveMany($design->charities);
            }
            if (count($design->assetSizes) > 0) {
                $orderItem->assetSizes()->saveMany($design->assetSizes);
            }

            return $orderItem;
        }

        return null;
    }

    /**
     * Update an order
     * 
     * @param array $data
     * @return App\Models\Order
     */
    public function updateOrder($data)
    {
        $user = Auth::user();
        if ($user->isSuperAdamin()) {
            $order = Order::find($data['order_id']);
            $order->update([
                'source_id' => $data['source_id'],
                'weight' => $data['weight']
            ]);

            return $order;
        }

        return null;
    }

    /**
     * Place an order
     * 
     * @param array $data
     * @return App\Models\Order
     */
    public function placeOrder($data)
    {
        $order = Order::find($data['order_id']);
        $user = Auth::user();
        if ($user->isSuperAdmin() || $order->user_id == $user->id) {
            if ($order->status == OrderStatus::NotPlaced && count($order->orderItem) > 0) {
                $total = 0;
                $discount = 0;
                foreach ($order->orderItems as $orderItem) {
                    $total += $orderItem->price * $orderItem->quantity;
                    foreach ($orderItem->charities as $charity) {
                        if ($charity->pivot->amount > 0) {
                            $charity->pendingBalances()->create([
                                'order_id' => $order->id,
                                'order_item_id' => $orderItem->id,
                                'amount' => $charity->pivot->amount
                            ]);
                        }
                    }
                }
                if (isset($data['coupon_id'])) {
                    $coupon = Coupon::find($data['coupon_id']);
                    if ($coupon->valid()) {
                        $discount = $coupon->discount($total);
                        $total = $total - $discount;
                    }
                }
                $billing = Billing::find($data['billing_id']);
                $charge = $user->charges()->create([
                    'order_id' => $order->id,
                    'amount' => $total,
                    'name' => $billing->name,
                    'address' => $billing->address,
                    'city' => $billing->city,
                    'state' => $billing->state,
                    'country' => $billing->country,
                    'zip' => $billing->zip,
                    'stripe_id' => $billing->stripe_id,
                    'card_brand' => $billing->card_brand,
                    'card_last_four' => $billing->card_last_four,
                    'status' => ChargeStatus::NotYet
                ]);
                if ($charge->charge($billing)) {
                    $order->status = OrderStatus::Placed;
                    $order->amount_charged = $charge->amount;
                    $order->discount = $discount;
                    $order->coupon_id = isset($data['coupon_id']) ? $data['coupon_id'] : 0;
                    $order->charge_id = $charge->id;
                    $order->save();
                }
            }
        }

        return $order;
    }

    /**
     * Retrieve total weight order
     *
     * @param App\Models\Order $order
     * @return number
     */
    public function getOrderTotalWeight(Order $order)
    {
        $totalWeight = 0;
        foreach ($order->orderItems() as $item)
        {
            $totalWeight += $item->quantiy * Product::findOrFail($item->product_id)->weight;
        }

        return $totalWeight;
    }
}