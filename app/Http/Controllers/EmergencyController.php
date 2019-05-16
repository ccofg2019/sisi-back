<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Validators\EmergencyValidator;
use App\Services\EmergencyService;
use App\Services\UserService;
use App\Http\Requests\StoreEmergencyRequest;
use App\Http\Requests\InsertNewPositionEmergencyRequest;
use App\PositionEmergency;
use App\Http\Requests\ChangeStatusEmergency;
use App\Emergency;

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

     public function insertNewPosition(InsertNewPositionEmergencyRequest $request){
        $emergency_id = $request->get('emergency_id');
        $latitude = $request->get('latitude');
        $longitude = $request->get('longitude');

        $positionEmergency = new PositionEmergency($emergency_id, $latitude, $longitude);
        
        $this->service->insertPosition($positionEmergency);
        
        return \response()->json('', 201);
     }

     public function changeStatus(ChangeStatusEmergency $request){
        $emergency_id = $request->get('emergency_id');
        $status = $request->get('status');

        $emergency = new Emergency($emergency_id, $status);

        $this->service->changeStatus($emergency);

        return \response()->json('', 200);
     }

}
