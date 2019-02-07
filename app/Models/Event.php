<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Enums\MorphType;

class Event extends Model
{
    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    /**
     * Get all of the users that are assigned this event.
     * 
     * @return array
     */
    public function users()
    {
        return $this->morphToMany(MorphType::Event, 'userable');
    }

    /**
     * Get the event instances for the event.
     */
    public function eventInstances()
    {
        return $this->hasMany('App\Models\EventInstance');
    }

    /**
     * check if a certain user has a admin role to this event
     * 
     * @param integer $user_id
     * @return boolean
     */
    public function hasAdminAccess($user_id)
    {
        $user = User::find($user_id);
        return $user->hasAdminAccess(MorphType::Event, $this->id);
    }

    /**
     * check if a certain user has read and admin roles to this event
     * 
     * @param integer $user_id
     * @return boolean
     */
    public function canRead($user_id)
    {
        $user = User::find($user_id);
        return $user->canRead(MorphType::Event, $this->id);
    }
}
