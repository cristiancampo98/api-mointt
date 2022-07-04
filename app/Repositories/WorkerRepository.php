<?php

namespace App\Repositories;

use App\Http\Resources\WorkerCollection;
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
}
