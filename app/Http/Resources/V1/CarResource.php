<?php

namespace App\Http\Resources\V1;

use Illuminate\Http\Resources\Json\ResourceCollection;

class CarResource extends ResourceCollection
{

    public function toArray($request)
    {
        return [
            'data' => $this->collection->transform(function($page){
                return [
                    'id' => $page->id,
                    'brand' => $page->brand,
                    'model' => $page->model,
                    'year' => $page->year,
                ];
            }),
        ];
    }

}
