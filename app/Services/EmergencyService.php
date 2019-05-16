<?php

namespace App\Services;

use App\Entities\AuditLog;
use App\Repositories\ZoneRepository;
use App\Services\Traits\CrudMethods;
use App\Repositories\EmergencyRepository;
use App\Entities\PositionEmergency;
use App\Repositories\PositionEmergencyRepository;
use App\PositionEmergency as AppPositionEmergency;
use App\Emergency;

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

        $positionEmergency = new AppPositionEmergency($emergency_id, $latitude, $longitude);

        $position = $this->insertPosition($positionEmergency);
        
        $newData = $this->repository->takeEmergency($emergency_id);
        \printf($newData);
        return $newData;
    }

    public function insertPosition(AppPositionEmergency $data){
        return $this->repositoryPositionEmergency->insert($data);
    }    

    public function changeStatus(Emergency $data){
        $this->repository->changeStatus($data);
    }
}
