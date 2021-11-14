<?php

namespace App\Http\Resources\V1;

use Illuminate\Http\Resources\Json\ResourceCollection;

class BalanceResource extends ResourceCollection
{

    public function toArray($request)
    {
        return [
            'data' => $this->collection->transform(function($page){
                return [
                    'id' => $page->id,
                    'user_id' => $page->user_id,
                    'user_balance' => $page->user_balance,
                ];
            }),
        ];
    }

}
