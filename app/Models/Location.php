<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    /**
     * Get the address record associated with the location.
     */
    public function address()
    {
        return $this->hasOne('App\Models\Address');
    }
}