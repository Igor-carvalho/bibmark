<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class UserCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $collection = $this->collection->map(function($user) {
            return [
                'id' => $user->id,
                'name' => $user->name,
                'firstname' => $user->firstname,
                'lastname' => $user->lastname,
                'email' => $user->email,
                'phone' => $user->phone,
                'is_superadmin' => $user->is_superadmin,
                'created_at' => $user->created_at,
                'updated_at' => $user->updated_at,
            ];
        });

        return [
            'users' => $collection
        ];
    }
}
