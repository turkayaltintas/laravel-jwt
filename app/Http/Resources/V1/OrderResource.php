<?php

namespace App\Http\Resources\V1;

use Illuminate\Http\Resources\Json\ResourceCollection;

class OrderResource extends ResourceCollection
{

    public function toArray($request)
    {
        return [
            'data' => $this->collection->transform(function($page){
                return [
                    'id' => $page->id,
                    'user_id' => $page->user_id,
                    'service' => $page->service,
                    'brand' => $page->brand,
                    'model' => $page->model,
                    'year' => $page->year,
                    'price' => $page->price,
                    'order_date' => $page->created_at,
                ];
            }),
        ];
    }
}
