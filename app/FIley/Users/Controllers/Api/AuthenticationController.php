<?php

namespace App\Filey\Users\Controllers\Api;
use App\Filey\ApiController;
use App\Filey\Users\User;
use Illuminate\Http\Request;
use App\Filey\Users\Resources\UserResource;
use Illuminate\Support\Facades\validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Tymon\JWTAuth\Facades\JWTAuth;
use App\Filey\Users\UseCases\UserUseCaseInterface;

class AuthenticationController extends ApiController
{
    private $userUseCase;

    public function __construct(UserUseCaseInterface $userUseCase)
    {
        $this->userUseCase = $userUseCase;
        $this->middleware('auth:api', ['except' => ['login','register']]);

    }

    public function register()
    {
        $data = request()->only([
            'name', 'email','password','password_confirmation',
        ]);
        $user = $this->userUseCase->createUser($data);
        if(isset($user['error'])){
            return $user['error'];
        }
        $user->token = JWTAuth::fromUser($user);
        $collection = collect(new UserResource($user))->toArray();
        return $this->respond($collection);
    }


    public function login()
    {
        $data = request()->only(['email', 'password']);
        $user = $this->userUseCase->loginUser($data);
        if(isset($user['error'])){
            return $user['error'];
        }
        $user->token = JWTAuth::fromUser($user);
        $collection = collect(new UserResource($user))->toArray();
        return $this->respond($collection);
    }
}
