<?php

namespace App\Services;

use Illuminate\Support\Facades\Auth;
use App\Models\{Order, OrderItem, Product, Coupon, Billing, Charge, Address};
use App\Enums\{OrderStatus, ChargeStatus};
use Illuminate\Support\Facades\Log;


class ShippingService
{
    protected $fedex_services = [
        'Ground' => 'FEDEX_GROUND',
        '2DAY' => 'FEDEX_2_DAY',
        'Overnight' => 'STANDARD_OVERNIGHT'
    ];

    protected $ups_services = [
        'Ground' => 'Ground',
        '2DAY' => '2ndDayAir',
        'Overnight' => 'NextDayAirSaverSent'
    ];

    public function __construct()
    {
        \EasyPost\EasyPost::setApiKey(env('EASYPOST_API_KEY'));

    }


    /**
     * get lower shipping rate
     *
     * @param App\Models\Order $order
     * @param float $weight
     * @param string $shippingMethod
     * @return array
     */
    public function getLowRateShipping(Order $order, $weight, $shippingMethod)
    {
        try {
            //Create from address
            $from_address_params = $this->prepareAddressToEasyPostArray($order->source_id);
            $from_address = \EasyPost\Address::create($from_address_params);

            //Create destination address
            $from_address_params = $this->prepareAddressToEasyPostArray($order->destination_id);
            $to_address = \EasyPost\Address::create($from_address_params);

            //Fedex parcel
            $parcel1 = \EasyPost\Parcel::create(array(
                "predefined_package" => 'FedExEnvelope',
                "weight" => $weight
            ));

            //UPS parcel
            $parcel2 = \EasyPost\Parcel::create(array(
                "predefined_package" => 'Pak',
                "weight" => $weight
            ));

            //create shipment via Fedex
            $shipment1 = \EasyPost\Shipment::create(array(
                "to_address" => $to_address,
                "from_address" => $from_address,
                "parcel" => $parcel1,
                "carrier_accounts" => [env('EASYPOST_FEDEX')]
            ));

            //create shipment via UPS
            $shipment2 = \EasyPost\Shipment::create(array(
                "to_address" => $to_address,
                "from_address" => $from_address,
                "parcel" => $parcel2,
                "carrier_accounts" => [env('EASYPOST_UPS')]
            ));

            if ($shippingMethod) {
                $fedexService = $this->fedex_services[$shippingMethod];
                $upsService = $this->ups_services[$shippingMethod];

                $rates1 = $shipment1->lowest_rate(array('Fedex'), array($fedexService));
                $rates2 = $shipment2->lowest_rate(array('Ups'), array($upsService));


            } else {
                $rates1 = $shipment1->lowest_rate(array('Fedex'));
                $rates2 = $shipment2->lowest_rate(array('Ups'));
            }
        } catch (\Exception $e) {
            Log::info($e->getMessage());
        }

        $lowestRate = $rates1->rate <= $rates2->rate ? $rates1 : $rates2 ;

        return $lowestRate;
    }

    public function prepareAddressToEasyPostArray($id)
    {
        $address = Address::findOrFail($id);

        return array(
            "street1" => $address->address_1,
            "street2" => $address->address_2,
            "city" => $address->city,
            "state" => $address->state,
            "zip" => $address->zip,
            "country" => $address->country,
            "company" => "EasyPost",
            "phone" => $address->phone
        );
    }

}