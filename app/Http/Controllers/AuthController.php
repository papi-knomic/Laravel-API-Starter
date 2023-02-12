<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterUserRequest;
use App\Repositories\UserRepository;
use App\Traits\Response;
use Illuminate\Http\JsonResponse;

class AuthController extends Controller
{
    /**
     * @var UserRepository
     */
    private $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }


    public function register( RegisterUserRequest $request ) : JsonResponse
    {
        $fields = $request->validated();

        $user = $this->userRepository->create($fields);

        return Response::successResponseWithData($user, 'Successful!, check your mail for verification code');
    }

}
