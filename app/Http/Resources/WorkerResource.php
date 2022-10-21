<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class WorkerResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return  [
            'id' => $this->id,
            'fullname' => "{$this->name} {$this->last_name}",
            'image' => $this->foto,
            'status' => new StatusResource($this->status),
            'dataWorker' =>  new DataWorkerResource($this->worker),
            'rates' => new RatesCollection($this->rates)
        ];
    }
}
