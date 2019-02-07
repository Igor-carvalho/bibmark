<?php

namespace App\Services;

use Illuminate\Support\Facades\Auth; 
use App\Models\Account;
use App\Enums\ChargeStatus;

class AccountService
{
    /**
     * Get all accounts
     * 
     * @return array
     */
    public function getAllAccounts()
    {
        return Account::all();
    }

    /**
     * Create or Update an account
     * 
     * @param array $data
     * @return App\Models\Account 
     */
    public function createOrUpdateAccount($data)
    {
        $user = Auth::user();
        if ($user->isSuperAdmin()) {
            $values = [
                'name' => $data['name'],
                'logo' => $data['logo'],
                'background_image' => $data['background_image'],
                'balance' => isset($data['balance']) ? floatval($data['balance']) : 0,
                'budget' => isset($data['budget']) ? floatval($data['budget']) : 0,
            ];
            if (isset($data['id'])) {
                $account = Account::find($data['id']);
                if ($account->update($values)) {
                    return $account;
                }
            } else {
                $account = Account::create($values);
                return $account;
            }
        }

        return null;
    }

    /**
     * Delete an account
     * 
     * @param integer accountId
     * @return boolean
     */
    public function deleteAccount($accountId)
    {
        $user = Auth::user();
        if ($user->isSuperAdmin()) {
            $account = Account::find($accountId);
            $account->users()->detach();
            $account->delete();
        }

        return false;
    }

    /**
     * Charge accounts
     * 
     * @return void
     */
    public function chargeAccounts()
    {
        $accounts = Account::where('balance', '<', 'budget')
                           ->where('balance', '>', 0)
                           ->where('budget', '>', 0)
                           ->get();
        foreach ($accounts as $account) {
            $billing = $account->defaultCard();
            if ($billing) {
                $charge = Charge::create([
                    'order_id' => 0,
                    'amount' => $account->budget - $account->balance,
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
                $charge->charge($billing);
            }
        }
    }
}
