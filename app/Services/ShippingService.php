<?php

namespace App\Services;

use Illuminate\Support\Facades\Auth;
use App\Models\{Order, OrderItem, Product, Coupon, Billing, Charge, Address};
use App\Enums\{OrderStatus, ChargeStatus};
use Illuminate\Support\Facades\Log;


class ShippingService
{
    /**
     * The Fedex service levels.
     *
     * @var array
     */
    protected $fedexServices = [
        'Ground' => 'FEDEX_GROUND',
        '2DAY' => 'FEDEX_2_DAY',
        'Overnight' => 'STANDARD_OVERNIGHT'
    ];

    /**
     * The UPS service levels.
     *
     * @var array
     */
    protected $upsServices = [
        'Ground' => 'Ground',
        '2DAY' => '2ndDayAir',
        'Overnight' => 'NextDayAirSaverSent'
    ];

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        \EasyPost\EasyPost::setApiKey(env('EASYPOST_API_KEY'));
    }

    /**
     * get lower shipping rate
     *
     * @param \App\Models\Order $order
     * @param float $weight
     * @param string $shippingMethod
     * @return object \EasyPost\Rate
     */
    public function chooseLowestRateFromCarriers(Order $order, $weight, $shippingMethod)
    {
        try {
            $fromAddressParams = $this->convertAddressToEasyPostArray($order->source_id);
            $fromAddress = \EasyPost\Address::create($fromAddressParams);
            $toAddressParams = $this->convertAddressToEasyPostArray($order->destination_id);
            $toAddress = \EasyPost\Address::create($toAddressParams);
            $parcelFedex = \EasyPost\Parcel::create(array(
                "predefined_package" => 'FedExEnvelope',
                "weight" => $weight
            ));
            $shipmentFedex = \EasyPost\Shipment::create(array(
                "to_address" => $toAddress,
                "from_address" => $fromAddress,
                "parcel" => $parcelFedex,
                "carrier_accounts" => [env('EASYPOST_FEDEX')]
            ));
            $parcelUPS = \EasyPost\Parcel::create(array(
                "predefined_package" => 'Pak',
                "weight" => $weight
            ));
            $shipmentUPS = \EasyPost\Shipment::create(array(
                "to_address" => $toAddress,
                "from_address" => $fromAddress,
                "parcel" => $parcelUPS,
                "carrier_accounts" => [env('EASYPOST_UPS')]
            ));
            if ($shippingMethod) {
                $fedexService = $this->fedexServices[$shippingMethod];
                $upsService = $this->upsServices[$shippingMethod];
                $rateFedex = $shipmentFedex->lowest_rate(array('Fedex'), array($fedexService));
                $rateUPS = $shipmentUPS->lowest_rate(array('Ups'), array($upsService));
            } else {
                $rateFedex = $shipmentFedex->lowest_rate(array('Fedex'));
                $rateUPS = $shipmentUPS->lowest_rate(array('Ups'));
            }
            $lowestRate = $rateFedex->rate <= $rateUPS->rate ? $rateFedex : $rateUPS;

            return $lowestRate;

        } catch (\Exception $e) {
            Log::info($e->getMessage());
        }

        return null;
    }

    /**
     * Prepare address to Easypost array
     *
     * @param integer $id
     * @return array
     */
    public function convertAddressToEasyPostArray($id)
    {
        $address = Address::findOrFail($id);

        return array(
            "street1" => $address->address_1,
            "street2" => $address->address_2,
            "city" => $address->city,
            "state" => $address->state,
            "zip" => $address->zip,
            "country" => $address->country,
            "company" => $address->name,
            "phone" => $address->phone
        );
    }

}