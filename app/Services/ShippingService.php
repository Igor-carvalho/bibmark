<?php

namespace App\Services;

use Illuminate\Support\Facades\Auth; 
use App\Models\{ Order, OrderItem, Product, Coupon, Billing, Charge, Address };
use App\Enums\{ OrderStatus, ChargeStatus };



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

   public function getLowRateShipping(Order $order, $weight, $shippingMethod)
   {
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
       ));

       //create shipment via UPS
       $shipment2 = \EasyPost\Shipment::create(array(
           "to_address" => $to_address,
           "from_address" => $from_address,
           "parcel" => $parcel2,
       ));

       $rates1 = $shipment1->get_rates();
       $rates2 = $shipment2->get_rates();

   }

   public function prepareAddressToEasyPostArray($id)
   {
       $address = Address::findOrFail($id);

      return array(
           "street1" => $address->address_1,
           "street2" => $address->address_2,
           "city"    => $address->city,
           "state"   => $address->state,
           "zip"     => $address->zip,
           "country" => $address->country,
           "company" => "EasyPost",
           "phone"   => $address->phone
       );
   }

}