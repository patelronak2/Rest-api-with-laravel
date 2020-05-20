<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Waterfall extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        // return parent::toArray($request);
        return [
            'id' => $this->_id,
            'type' => $this->type,
            'attributes' => [
                'name' => $this->properties['NAME'],
                'alternate_name' => $this->properties['ALTERNATE_NAME'],
                'community' => $this->properties['COMMUNITY'],
                'cluster_area' => $this->properties['CLUSTER_AREA'],
                'height_in_m' => $this->properties['HEIGHT_IN_M'],
                'width_in_m' => $this->properties['WIDTH_IN_M'],
                'ownership' => $this->properties['OWNERSHIP'],
                'access_from' => $this->properties['ACCESS_FROM']
            ],
            'geometry' => $this->geometry,
            'links' => [
                'self' => url("/api/waterfall/{$this->_id}"),
            ]
        ];
    }

    public function with($request){
        return [
            'author_url' => url('https://ronakjpatel.com/'),
            'credits' => 'Contains public sector Data made available under the City of Hamilton’s Open Data Licence'
        ];
        
    }
}