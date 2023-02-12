<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginUserRequest;
use App\Http\Requests\RegisterUserRequest;
use App\Repositories\UserRepository;
use App\Traits\Response;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;

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

    public function login( LoginUserRequest $request ) : JsonResponse
    {
        $userData = $request->validated();

        if (Auth::attempt($userData)) {
            $token = config('keys.token');
            $accessToken = Auth::user()->createToken($token)->plainTextToken;
            $data = auth()->user();
            return Response::successResponseWithData($data, 'Login successful', 200, $accessToken);
        }
        return Response::errorResponse('Invalid Login credentials', 400);
    }

}
