<?php

namespace App\Http\Controllers\V1;

use App\Http\Controllers\ResponseController;
use App\Http\Requests\LoginRequest;
use App\Repositories\UserRepository;
use Illuminate\Support\Facades\Hash;

class LoginController extends ResponseController
{
    private $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function login(LoginRequest $request)
    {
        $user = $this->userRepository->getByEmail($request->email);

        if (!$user || !Hash::check($request->password, $user->password)) {
            $error = 'Las credenciales proveídas son incorrectas.';
            return $this->sendError($error, [], 422);
        }

        $response = [
            'token' => $user->createToken($request->email)->plainTextToken
        ];

        return $this->sendResponse($response, 'Autenticación exitosa.');
    }
}
