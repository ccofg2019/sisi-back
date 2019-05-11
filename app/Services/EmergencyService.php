<?php

namespace App\Services;

use App\Entities\AuditLog;
use App\Repositories\ZoneRepository;
use App\Services\Traits\CrudMethods;
use App\Repositories\EmergencyRepository;
use App\Entities\PositionEmergency;
use App\Repositories\PositionEmergencyRepository;

/**
 * Class ZoneService
 *
 * @package App\Services
 */
class EmergencyService extends AppService
{
    use CrudMethods {
        all    as protected processAll;
        create as protected processCreate;
        update as protected processUpdate;
        delete as protected processDelete;
    }

    /**
     * @var EmergencyRepository $repository
     */
    protected $repository;

    /**
     * @var PositionRepository $repositoryPositionEmergency
     */
    protected $repositoryPositionEmergency;

    /**
     * EmergencyService constructor.
     *
     * @param EmergencyRepository $repository
     * @param PositionEmergency $positionEmergency
     */
    public function __construct(EmergencyRepository $repository,
                                PositionEmergencyRepository $positionEmergency)
    {
        $this->repository = $repository;
        $this->repositoryPositionEmergency = $positionEmergency;
    }

    public function insert($data){
        $user_id = $data['user_id'];
        $emergency = $this->repository->createNewEmergency($user_id);

        $emergency_id = $emergency['id'];
        $latitude = $data['position']['latitude'];
        $longitude = $data['position']['longitude'];

        $dataPosition = array('emergency_id' => $emergency_id,
                              'position' => array(
                                  'latitude' => $latitude,
                                  'longitude' => $longitude 
                              ));
        $position = $this->insertFirsPosition($dataPosition);
        return $position;
    }

    private function insertFirsPosition($data){
        return $this->repositoryPositionEmergency->insert($data);
    }

    
}
