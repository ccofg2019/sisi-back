<?php

namespace App\Validators;

use \Prettus\Validator\Contracts\ValidatorInterface;
use \Prettus\Validator\LaravelValidator;

/**
 * Class UserValidator.
 *
 * @package namespace App\Validators;
 */
class UserValidator extends LaravelValidator
{
    /**
     * Validation Rules
     *
     * @var array
     */
    protected $rules = [
        ValidatorInterface::RULE_CREATE => [
            'name' 		 	 => 'required|max:100',
            'cpf'            => 'required|max:14|unique:users,cpf',
            'birthdate'      => 'required|date',
            'gender'         => 'required|in:MASCULINO,FEMININO,TRANS_MASC,TRANS_FEM,NAO_DECLARADO',
            'skin_color'     => 'required|in:BRANCO,PARDO,NEGRO,INDIGENA,AMARELO,NAO_DECLARADO',
            'cellphone'      => 'required|string',
            'phone'          => 'string',
            'email'    		 => 'required|email|max:150|unique:users,email',
            'password'       => 'required|max:32|string',
            'status'  	 	 => 'required|in:ATIVO,BLOQUEADO,INATIVO',
        ],
        ValidatorInterface::RULE_UPDATE => [
            'name' 		 	 => 'max:100',
            'cpf'            => 'max:14|unique:users,cpf',
            'birthdate'      => 'date',
            'gender'         => 'in:MASCULINO,FEMININO,TRANS_MASC,TRANS_FEM,NAO_DECLARADO',
            'skin_color'     => 'in:BRANCO,PARDO,NEGRO,INDIGENA,AMARELO,NAO_DECLARADO',
            'cellphone'      => 'string',
            'phone'          => 'string',
            'email'    		 => 'email|max:150|unique:users,email',
            'password'       => 'max:32|string',
            'status'  	 	 => 'sometimes|in:ATIVO,BLOQUEADO,INATIVO',
        ],
    ];
}
