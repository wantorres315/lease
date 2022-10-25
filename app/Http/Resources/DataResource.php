<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

use \App\Models\Location;
use \App\Models\Data;

class DataResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'model' => $this->model,
            'ram' => $this->ram,
            'hdd' => $this->hdd,
            'location' => Location::select('name')->where('id',$this->location)->first(),
            'price'=> $this->price
            
            
        ];
    }
}
