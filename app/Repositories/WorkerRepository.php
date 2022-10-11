<?php

namespace App\Repositories;

use App\Http\Resources\WorkerCollection;
use App\Http\Resources\WorkerResource;
use App\Models\User;

class WorkerRepository
{
    public function __construct()
    {
        $this->model = new User();
    }

    public function getAll()
    {
        return new WorkerCollection($this->model->has('worker')->with('worker')->where('id_tipo_usuario', 2)->paginate());
    }

    public function getById()
    {
        return new WorkerResource($this->model->find(request()->id));
    }
}
