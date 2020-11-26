<?php


namespace App\Filey\Users\UseCases;


use App\Filey\Users\Repository\UserRepositoryInterface;
use App\Filey\Users\UseCases\UserUseCaseInterface;
use App\Filey\Users\User;
use Illuminate\Support\Facades\Config;
use App\Filey\ApiController;
use Illuminate\Support\Facades\Auth;

class UserUseCase implements UserUseCaseInterface
{

    private $userRepo;
    private $apiResponse;

 
    public function __construct(UserRepositoryInterface $userRepo) {
        $this->userRepo = $userRepo;
        $this->apiResponse = new ApiController();
    }

    public function createUser($data)
    {
        $validations = $this->validateCreateUser($data);
        if(isset($validations['error'])){
            return $validations;
        }
        unset($data['password_confirmation']);
        $data['password'] = bcrypt($data['password']);
        $user = $this->userRepo->create($data);
        return $user;
    }

    private function validateCreateUser($data){
        validator($data, [
            'name' => 'required|string',
            'email' => 'required|string|email|max:255',
            'password' => 'required|confirmed|min:6',
        ])->validate();
        $user = $this->userRepo->findByEmail($data['email']);
        if($user){
            $validations['error']=$this->apiResponse->respondExist("This user already exist"); 
            return $validations;
        }
    }

    public function loginUser($data){
        $this->validateLoginUser($data);
        if (!Auth::attempt(['email' => $data['email'], 'password' => $data['password']])) {
            $validations['error'] = $this->apiResponse->respondAuthError("Email or password is incorrect");
            return $validations;
        }
        $user = $this->userRepo->findByEmail($data['email']);
        return $user;
    }

    private function validateLoginUser($data){
        validator($data, [
            'email' => 'required|email|exists:users,email',
            'password' => 'required',
        ])->validate();
    }

}
