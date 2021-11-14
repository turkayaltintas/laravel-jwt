<?php

namespace App\Http\Resources\V1;

use Illuminate\Http\Resources\Json\ResourceCollection;

class ServiceResource extends ResourceCollection
{

    public function toArray($request)
    {
        return [
            'data' => $this->collection->transform(function($page){
                return [
                    'id' => $page->id,
                    'name' => $page->name,
                    'description' => $page->description,
                    'price' => $page->price,
                ];
            }),
        ];
    }
}
