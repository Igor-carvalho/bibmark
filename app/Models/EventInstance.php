<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EventInstance extends Model
{
    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    /**
     * Get the event that owns the event instance.
     */
    public function event()
    {
        return $this->belongsTo('App\Models\Event');
    }
}
