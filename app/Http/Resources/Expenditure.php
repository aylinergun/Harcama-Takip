<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Expenditure extends JsonResource
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
          'category_id'=>$this->category_id,
          'total'=>$this->total,
          'date'=>$this->date,
          'location'=>$this->location,
        ];
        //parent::toArray($request);
    }
}
