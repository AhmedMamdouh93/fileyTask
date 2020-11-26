<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;

class AuthController extends Controller
{
    /**
     * Create a new AuthController instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['login']]);
    }

    /**
     * Get a JWT token via given credentials.
     *
     * @param  \Illuminate\Http\Request  $request
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if ($token = $this->guard()->attempt($credentials)) {
            return $this->respondWithToken($token);
        }

        return response()->json(['error' => 'Unauthorized'], 401);
    }

    /**
     * Get the authenticated User
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function me()
    {
        return response()->json($this->guard()->user());
    }

    /**
     * Log the user out (Invalidate the token)
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function logout()
    {
        $this->guard()->logout();

        return response()->json(['message' => 'Successfully logged out']);
    }

    /**
     * Refresh a token.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function refresh()
    {
        return $this->respondWithToken($this->guard()->refresh());
    }

    /**
     * Get the token array structure.
     *
     * @param  string $token
     *
     * @return \Illuminate\Http\JsonResponse
     */
    protected function respondWithToken($token)
    {
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => $this->guard()->factory()->getTTL() * 60
        ]);
    }

    /**
     * Get the guard to be used during authentication.
     *
     * @return \Illuminate\Contracts\Auth\Guard
     */
    public function guard()
    {
        return Auth::guard();
    }

    public function postRegister(UserRegisterRequest $request)
    {
        $data = $request->getContent();
        $data = $this->parserInterface->deserialize($data);
        $data = $data->getData();
        try {
            DB::beginTransaction();

            $requestData = [
                'profile_picture' => isset($data->attach_media) ? moveSingleGarbageMedia($data->attach_media['id'], 'profiles') : null,
                'first_name' => $data->first_name,
                'last_name' => $data->last_name,
                'email' => $data->email,
                'birth_date' => $data->birth_date,
                'country_id' => $data->country_id,
    //                'mobile' => $data->mobile,
                'password' => $data->password,
                'type' => $data->user_type
            ];

            if ($data->user_type == UserEnums::STUDENT_TYPE) {
                $studentRequestData = [
                    'educational_system_id' => $data->educational_system_id,
                    'school_id' => $data->school_id,
                    'class_id' => $data->class_id,
                    'academical_year_id' => $data->academical_year_id,
                ];
                $requestData = array_merge($requestData, $studentRequestData);
            }

            $user = $this->registerUseCase->register($requestData, $this->repository);

            DB::commit();

            if ($user) {
                if ($data->device_token)
                    $user->firebaseTokens()->create([
                        'device_token' => $data->device_token
                    ]);
                $this->sendActivationMailUseCase->send($user);
            }
            if (!is_null($user)) {
                $meta = [
                    'token' => JWTAuth::fromUser($user),
                    'message' => trans('api.Thanks for registeration'),
                ];

                UserModified::dispatch($data->toArray(), $user->toArray(), 'User registered');

                $include = '';

                if ($user->type == UserEnums::STUDENT_TYPE) {
                    $include = $request->include ?? 'student';
                }

                if ($user->type == UserEnums::PARENT_TYPE) {
                    $include = $request->include ?? 'parent';
                }

                if ($user->type == UserEnums::INSTRUCTOR_TYPE) {
                    $include = $request->include ?? 'instructor';
                }
                //send data to transformer
                return $this->transformDataModInclude($user, $include, new UserAuthTransformer(), ResourceTypesEnums::USER, $meta);
            }
        } catch (\Throwable $e) {
            Log::error($e);
    //            throw  $e;
            throw new OurEduErrorException($e->getMessage());

        }
    }
}