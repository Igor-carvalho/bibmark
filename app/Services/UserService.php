<?php

namespace App\Services;

use Illuminate\Support\Facades\Auth; 
use App\Models\User;
use App\Models\{Account, Charity, Event};
use App\Enums\{ MorphType, UserRole };

class UserService
{
    /**
     * Get a user with id
     * 
     * @param integer $userId
     * @return App\Models\User
     */
    public function user($userId)
    {
        return User::find($userId);
    }

    /**
     * Get all users belong to the account
     * 
     * @param integer $accountId
     * @return array
     */
    public function usersWithAccountId($accountId)
    {
        $user = Auth::user();
        if ($user->isSuperAdmin() || $user->canRead(MorphType::Account, $accountId)) {
            return Account::find($accountId)->users;
        }

        return [];
    }

    /**
     * Get all users
     * 
     * @param string $search
     * @return array
     */
    public function users($search)
    {
        $user = Auth::user();
        if ($user->isSuperAdmin()) {
            if (isset($search)) {
                return User::search($search)->except(Auth::id());
            } else {
                return User::all()->except(Auth::id());
            }
        }

        return [];
    }

    /**
     * Create or update an user belongs to the account
     * 
     * @param array $data
     * @return App\Models\User
     */
    public function createOrUpdateUserUnderAccount($data)
    {
        if (isset($data['user_id'])) {
            $user = User::find($data['user_id']);
            $user->accounts()->updateExistingPivot($data['account_id'], [
                'role' => $data['role']
            ]);
            
            return $user;
        } else {
            $account = Account::find($data['account_id']);
            $names = explode(' ', $data['name'], 2);
            $firstname = $names[0];
            $lastname = !empty($names[1]) ? $names[1] : '';
            $user = $account->users()->create([
                'name' => $data['name'],
                'firstname' => $firstname,
                'lastname' => $lastname,
                'email' => $data['email'],
                'password' => bcrypt(str_random(8))
            ]);

            return $user;
        }
    }

    /**
     * Create or Update an user
     * 
     * @param array $data
     * @return App\Models\User
     */
    public function createOrUpdateUser($data)
    {
        $user = Auth::user();
        if ($user->isSuperAdmin()) {
            $names = explode(' ', $data['name'], 2);
            $firstname = $names[0];
            $lastname = !empty($names[1]) ? $names[1] : '';
            $values = [
                'name' => $data['name'],
                'email' => $data['email'],
                'phone' => $data['phone'],
                'firstname' => $firstname,
                'lastname' => $lastname,
                'password' => bcrypt(str_random(8))
            ];
            if (isset($data['id'])) {
                $user = User::find($data['id']);
                if ($user->update($values)) {
                    return $user;
                }
            } else {
                $user = User::create($values);
                return $user;
            }
        }

        return null;
    }

    /**
     * Delete a user
     * 
     * @param integer userId
     * @return boolean
     */
    public function deleteUser($userId)
    {
        if (Auth::user()->isSuperAdmin()) {
            $user = User::find($userId);
            $user->accounts()->detach();
            $user->charities()->detach();
            $user->events()->detach();
            return $user->delete();
        }

        return false;
    }

    /**
     * get user relations data Accounts, Charities, Events
     * or total Accounts, Charities, Events, Users if user is admin
     *
     * @param integer userId
     * @return array
     */
    public function getDashboardAchievements($userId)
    {
        $user = User::find($userId);
        if ($user->isSuperAdmin()) {
            $totalAccounts = Account::all();
            $totalCharities = Charity::all();
            $totalEvents = Event::all();
            $totalUsers = User::all()->except(Auth::id());

            return [
                'total_accounts' => json_encode($totalAccounts),
                'total_charities' => json_encode($totalCharities),
                'total_events' => json_encode($totalEvents),
                'total_users' => json_encode($totalUsers)
            ];
        }
        $userAccounts = $user->accounts;
        $userCharities = $user->charities;
        $userEvents = $user->events;

        return [
            'user_accounts' => json_encode($userAccounts),
            'user_charities' => json_encode($userCharities),
            'user_events' => json_encode($userEvents)
        ];
    }
}
