<?php

namespace App\Http\Controllers\V1;

use App\Http\Controllers\ResponseController;
use App\Repositories\WorkerRepository;

class WorkerController extends ResponseController
{
    private $workerRepository;

    public function __construct(WorkerRepository $workerRepository)
    {
        $this->workerRepository = $workerRepository;
    }

    public function getAllWorkers()
    {
        return $this->workerRepository->getAll();
    }

    public function getWorkerById()
    {
        return $this->workerRepository->getById();
    }
}
