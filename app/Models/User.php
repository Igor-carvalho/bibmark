<?php

namespace App\Models;

use Laravel\Passport\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Enums\{ MorphType, UserRole };

class User extends Authenticatable
{
    use HasApiTokens, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'firstname', 'lastname', 'email', 'phone', 'password', 'is_superadmin', 'photo'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * check if a user is super admin
     *
     * @return boolean
     */
    public function isSuperAdmin()
    {
        return $this->is_superadmin;
    }

    /**
     * check if a certain user has admin access to
     *
     * @param UserableType $type
     * @param integer $type_id
     * @return boolean
     */
    public function hasAdminAccess($type, $typeId)
    {
        $count = $this->morphedByMany($type, 'userable')
            ->wherePivot('userable_id', $typeId)
            ->wherePivot('role', UserRole::Admin)
            ->count();

        return $count > 0;
    }

    /**
     * check if a certain user has read access to
     *
     * @param UserableType $type
     * @param integer $type_id
     * @return boolean
     */
    public function canRead($type, $typeId)
    {
        $count = $this->morphedByMany($type, 'userable')
            ->wherePivot('userable_id', $typeId)
            ->wherePivotIn('role', [UserRole::Admin, UserRole::ReadOnly])
            ->count();

        return $count > 0;
    }

    /**
     * check if a user has read access to
     *
     * @return boolean
     */
    public function isAccess()
    {
        $types = [MorphType::Charity, MorphType::Event, MorphType::Account];

        $result = false;
        foreach ($types as $type) {
            $count = $this->morphedByMany($type, 'userable')
                ->wherePivotIn('role', [UserRole::Admin, UserRole::ReadOnly])
                ->count();

            if ($count > 0) {
                $result = true;
                break;
            }
        }

        return $result || $this->isSuperAdmin() == 0;
    }

    /**
     * Get all of the accounts that are assigned this user.
     *
     * @return array
     */
    public function accounts()
    {
        return $this->morphedByMany(MorphType::Account, 'userable');
    }

    /**
     * Get all of the charities that are assigned this user.
     *
     * @return array
     */
    public function charities()
    {
        return $this->morphedByMany(MorphType::Charity, 'userable');
    }

    /**
     * Get all of the events that are assigned this user.
     *
     * @return array
     */
    public function events()
    {
        return $this->morphedByMany(MorphType::Event, 'userable');
    }

    /**
     * Get all of the user's assets
     *
     * @return array
     */
    public function assets()
    {
        return $this->morphMany('App\Models\Asset', 'assetable');
    }

    /**
     * Get all of the user's cards
     *
     * @return array
     */
    public function cards()
    {
        return $this->morphMany(MorphType::Billing, 'billingable');
    }

    /**
     * Get all of the user's charges
     *
     * @return array
     */
    public function charges()
    {
        return $this->morphMany(MorphType::Charge, 'chargeable');
    }

    /**
     * Search users by name and email
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @param string $search
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeSearch($query, $search)
    {
        return $query->where(function($query) use ($search) {
            $query->where('name', 'LIKE', "%$search%")
                ->orWhere('email', 'LIKE', "%$search%");
        });
    }
}
