<?php

namespace App\Repositories;

use App\Http\Resources\EmployerResource;
use App\Http\Resources\UserResource;
use App\Http\Resources\WorkerResource;
use App\Models\User;

class UserRepository
{
    public function __construct()
    {
        $this->model = new User();
    }

    public function profile()
    {
        return new UserResource(request()->user());
    }

    public function workerProfile()
    {
        return new WorkerResource(request()->user()->worker);
    }

    public function employerProfile()
    {
        return new EmployerResource(request()->user()->employer);
    }

    public function getByEmail(String $email)
    {
        return $this->model->where('email', $email)->first();
    }
}
