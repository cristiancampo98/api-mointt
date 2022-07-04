<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class DataWorkerResource extends JsonResource
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
            'category' => new CategoryResource($this->category),
            'specialty' => new SpecialtyResource($this->specialty),
            'experience' => new ExperienceResource($this->experience),
            'cost_per_our' => $this->valor_hora
        ];
    }
}
