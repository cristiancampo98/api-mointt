<?php

namespace App\Http\Controllers\V1;

use App\Http\Controllers\ResponseController;
use App\Repositories\EmployerRepository;

class EmployerController extends ResponseController
{
    private $employerRepository;

    public function __construct(EmployerRepository $employerRepository)
    {
        $this->employerRepository = $employerRepository;
    }

    public function getAllEmployers()
    {
        return $this->employerRepository->getAll();
    }

    public function getEmployerById()
    {
        return $this->employerRepository->getById();
    }
}
