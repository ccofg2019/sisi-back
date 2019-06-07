<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\PasswordRecoveryStoreRequest;
use App\Services\PasswordRecoveryService;
use App\Http\Requests\ChangePasswordRRecoveryRequest;

class PasswordRecoveryController extends Controller
{
    /**
     * @var PasswordRecoveryService
     */
    protected $service;
 
     public function __construct(PasswordRecoveryService $service)
     {
         $this->service = $service;
     }

    public function store(PasswordRecoveryStoreRequest $request){
        $email = $request->get('email');
        $cpf = $request->get('cpf');
        $birthdate = $request->get('birthdate');

        $data = $this->service->store($email, $cpf, $birthdate);

        if($data == null)
            return response()->json(array('message' => 'As informações preenchidas não são válidas!'), 400);

        return response()->json($data, 200);
    }

    public function ChangePassword(ChangePasswordRRecoveryRequest $request){
        $key = $request->get('key');
        $newPassword = $request->get('newPassword');

        $dataResult = $this->service->changePassword($key, $newPassword);

        if($dataResult == false){
            return response()->json(array('message' => 'Infelizmente não foi possível alterar a sua senha... Por favor, tente novamente!'), 400);
        }
        return response()->json(array('message' => 'Sua senha foi alterada com sucesso!'), 200);
    }
}