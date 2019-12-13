<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProblemNumberReadyResources extends JsonResource
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
            'number'=>$this->number,
            'pertanyaan'=>$this->pertanyaan,
            'problem_id'=>$this->problem_id,
        ];
    }
}
