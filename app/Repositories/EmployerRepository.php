<?php

namespace App\Repositories;

use App\Models\User;

class EmployerRepository
{
    public function __construct()
    {
        $this->model = new User();
    }

    public function getAll()
    {
        return $this->model->has('employer')->with('employer')->where('id_tipo_usuario', 1)->paginate();
    }

    public function getById()
    {
        $result = $this->model->with('employer')->find(request()->id);
        if (is_null($result->employer)) {
            return false;
        }
        return $result;
    }
}
