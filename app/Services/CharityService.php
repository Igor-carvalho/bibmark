<?php

namespace App\Services;

use Illuminate\Support\Facades\Auth; 
use App\Models\Charity;

class CharityService
{
    /**
     * Get all charities
     * 
     * @return array
     */
    public function getAllCharities()
    {
        return Charity::all();
    }

    /**
     * Get charity by id
     *
     * @param integer $id
     * @return App\Models\Charity
     */
    public function getCharityById($id)
    {
        return Charity::find($id);
    }

    /**
     * Create or Update a charity
     * 
     * @param array $data
     * @return App\Models\Charity 
     */
    public function createOrUpdateCharity($data)
    {
        $user = Auth::user();
        if ($user->isSuperAdmin()) {
            $values = [
                'name' => $data['name'],
                'logo' => $data['logo'],
                'background_image' => $data['background_image'],
                'balance' => isset($data['balance']) ? floatval($data['balance']) : 0,
            ];
            if (isset($data['id'])) {
                $charity = Charity::find($data['id']);
                if ($charity->update($values)) {
                    return $charity;
                }
            } else {
                $charity = Charity::create($values);
                return $charity;
            }
        }

        return null;
    }

    /**
     * Delete a charity
     * 
     * @param integer charityId
     * @return boolean
     */
    public function deleteCharity($charityId)
    {
        $user = Auth::user();
        if ($user->isSuperAdmin()) {
            $charity = Charity::find($charityId);
            $charity->users()->detach();
            $charity->delete();
        }

        return false;
    }
}
