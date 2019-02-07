<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class AccountCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $collection = $this->collection->map(function($account) {
            return [
                'id' => $account->id,
                'name' => $account->name,
                'logo' => $account->logo,
                'background_image' => $account->background_image,
                'balance' => number_format($account->balance, 2),
                'budget' => number_format($account->budget, 2),
                'created_at' => $account->created_at,
                'updated_at' => $account->updated_at,
            ];
        });

        return [
            'accounts' => $collection
        ];
    }
}
