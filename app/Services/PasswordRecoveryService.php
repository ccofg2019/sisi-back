<?php

namespace App\Services;

use App\Services\AppService;
use App\Repositories\PasswordRecoveryRepository;
use App\Repositories\UserRepository;
use Illuminate\Support\Facades\Hash;
use App\Entities\PasswordRecovery;
use App\Http\Requests\ChangePasswordRRecoveryService;

class PasswordRecoveryService extends AppService{

    /**
     * @var PasswordRecoveryRepository $repository
     */
    protected $repository;

    /**
     * @var UserRepository $userRepository
     */
    protected $userRepository;

    public function __construct(PasswordRecoveryRepository $repository,
                                UserRepository $userRepository)
    {
        $this->repository = $repository;
        $this->userRepository = $userRepository;
    }

    public function store($email, $cpf, $birthdate){
        $queryUser = $this->userRepository->validInformationsEmail($email, $cpf, $birthdate);
        $userId = $queryUser['data'][0]['id'];
        
        $hashBuild =  $email . $cpf . $birthdate;
        $hash = Hash::make($hashBuild);
        
        $this->repository->UpdateColumnIsValidAllToUser($userId);
        $dataPasswordRequest = $this->repository->store($hash, $userId);

        return $dataPasswordRequest;
    }

    public function changePassword($key, $newPassword){
        $keyInformation = $this->repository->findKey($key);
        if(empty($keyInformation) || $keyInformation == null){
            return false;
        }        
        if($keyInformation['isValid'] == 'S'){
            $user_id = $keyInformation['user_id'];
            $this->repository->UpdateColumnIsValidAllToUser($user_id);
            $this->userRepository->changePassword($user_id, $newPassword);
            return true;
        }
        return false;
    }
}