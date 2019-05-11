<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Validators\EmergencyValidator;
use App\Services\EmergencyService;
use App\Services\UserService;
use App\Http\Requests\StoreEmergencyRequest;

/**
 * Class EmergencyController.
 *
 * @package namespace App\Http\Controllers;
 */
class EmergencyController extends Controller
{
    /**
     * @var EmergencyService
     */
    protected $service;

     /**
      * @var EmergencyValidator
      */
     protected $validator;
 
     /**
      * CoordinatesController constructor.
      *
      * @param CoordinateRepository $repository
      * @param CoordinateValidator $validator
      */
     public function __construct(EmergencyService $service, EmergencyValidator $validator)
     {
         $this->service = $service;
         $this->validator  = $validator;
     }

     public function store(StoreEmergencyRequest $request){
        $user = UserService::getUser(true);
        $idUser = $user->id;

        $latitude = $request->get('latitude');
        $longitude = $request->get('longitude');

        $data = array('user_id' => $idUser,
                      'position' => array(
                          'latitude' => $latitude,
                          'longitude' => $longitude
                      ));

        $data2 = $this->service->insert($data);
        return \response()->json($data, 201);        
     }

}
