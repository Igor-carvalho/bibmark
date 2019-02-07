<?php

namespace App\Services;

use Illuminate\Support\Facades\Auth; 
use App\Models\Address;

class AddressService
{
	public function __construct()
	{
		\EasyPost\EasyPost::setApiKey(env('EASYPOST_API_KEY'));
	}

    /**
     * Create an address
     * 
     * @return boolean
     */
    public function createAddress($data)
    {
		$epAddress = \EasyPost\Address::create([
		    'name' => $data['name'],
		    'street1' => $data['address_1'],
		    'street2' => isset($data['address_2']) ?: ' ',
		    'city' => $data['city'],
		    'state' => $data['state'],
		    'zip' => $data['postal_code'],
		    'country' => isset($data['country']) ?: 'US',
		    'email' => $data['email'],
		    'phone' => $data['phone'],
		    'verify' => ["delivery"]
		]);
        if ($epAddress->verifications->delivery->success) {
            $address = Address::create([
                'name' => $epAddress->name,
				'address_1' => $epAddress->street1,
				'address_2' => $epAddress->street2,
				'city' => $epAddress->city,
				'state' => $epAddress->state,
				'zip' => $epAddress->zip,
				'country' => $epAddress->country,
				'email' => $epAddress->email,
				'phone' => $epAddress->phone,
				'verified_address_id' => $epAddress->id,
            ]);
            return $address;
        }

        return null;
    }

}
