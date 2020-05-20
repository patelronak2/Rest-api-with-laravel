<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class WaterfallCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'type' => "FeatureCollection",
            'data' => $this->collection,
            'links' => [
                'self' => url("/api/waterfalls"), 
            ],
            'meta' => [
                'displaying_result' =>$this->collection->count(),
                'author_url' => url('https://ronakjpatel.com/'),
                'credits' => 'Contains public sector Data made available under the City of Hamilton’s Open Data Licence',
            ]
        ];
    }
}