<?php

namespace App\Services;

use Illuminate\Support\Facades\Auth; 
use App\Models\{ Location, Address };

class LocationService
{
    /**
     * Get all locations
     * 
     * @return array
     */
    public function getAllLocations()
    {
        return Location::all();
    }

    /**
     * Create or Update a location
     * 
     * @param array $data
     * @return App\Models\Event
     */
    public function createOrUpdateLocation($data)
    {
        $user = Auth::user();
        if ($user->isSuperAdmin()) {
            $values = [
                'name' => $data['name'],
            ];
            if (isset($data['id'])) {
                $location = Location::find($data['id']);
                if ($location->update($values)) {
                    return $location;
                }
            } else {
                $location = Location::create($values);
                $address = Address::find($data['address_id']);
                $address->update(['location_id' => $location->id]);
                return $location;
            }
        }

        return null;
    }

    /**
     * Delete a location
     * 
     * @param integer $locationId
     * @return boolean
     */
    public function deleteLocation($locationId)
    {
        $user = Auth::user();
        if ($user->isSuperAdmin()) {
            $location = Location::find($locationId);
            $location->delete();
        }

        return false;
    }
}
