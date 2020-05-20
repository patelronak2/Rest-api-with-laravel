<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class LiveMusicVenue extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->_id,
            'type' => $this->type,
            'attributes' => $this->attributes,
            'geometry' => $this->geometry,
            'links' => [
                'self' => url("/api/livemusic/{$this->_id}")
            ],
        ];
    }

    public function with($request){
        return [
            'author_url' => url('https://ronakjpatel.com/'),
            'credits' => 'Contains public sector Data made available under the City of Hamilton’s Open Data Licence'
        ];
        
    }

}