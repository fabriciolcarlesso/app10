<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Developers extends JsonResource
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
            'id' => $this->id,
            'name' => $this->name,
            'sex' => $this->sex,
            'birthdate' => $this->birthdate,
            'age' => $this->age,
            'hobby' => $this->hobby,
          ];
    }
}
