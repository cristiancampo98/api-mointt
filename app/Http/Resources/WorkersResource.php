<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class WorkersResource extends JsonResource
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
            'name' => $this->name,
            'last_name' => $this->last_name,
            'photo' => $this->foto,
            'department' => $this->department->departamento,
            'city' => $this->city->municipio,
            'data_worker' => new DataWorkerResource($this->worker),
            'rates' => $this->getAverageScore() //$this->rates->sum('puntuacion') / $this->rates->count()

        ];
    }

    public function getAverageScore()
    {
        $totalRates = $this->rates->count();
        if (!$totalRates) {
            return $totalRates;
        }
        return $this->rates->sum('puntuacion') / $totalRates;
    }
}
