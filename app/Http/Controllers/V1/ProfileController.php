<?php

namespace App\Http\Controllers\V1;

use App\Http\Controllers\Controller;
use App\Repositories\UserRepository;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    private $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function profile()
    {
        return $this->userRepository->profile();
    }

    public function workerProfile()
    {
        return $this->userRepository->workerProfile();
    }

    public function employerProfile()
    {
        return $this->userRepository->employerProfile();
    }
}
