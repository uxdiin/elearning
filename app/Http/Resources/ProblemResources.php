<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProblemResources extends JsonResource
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
            'id'=>$this->id,
            'start_time'=>$this->start_time,
            'start_date'=>$this->start_date,
            'end_time'=>$this->end_time,
            'end_date'=>$this->end_date,
            'title'=>$this->title
        ];
    }
}
