<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\PositionEmergencyRepository;
use App\Entities\PositionEmergency;
use App\Validators\PositionEmergencyValidator;
use App\PositionEmergency as AppPositionEmergency;

/**
 * Class PositionEmergencyRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class PositionEmergencyRepositoryEloquent extends BaseRepository implements PositionEmergencyRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return PositionEmergency::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }

    public function insert(AppPositionEmergency $data){
        $emergency_id = $data->emergency_id;
        $latitude = $data->latitude;
        $longitude = $data->longitude;
        return $this->create(['emergency_id' => $emergency_id,
                              'latitude' => $latitude,
                              'longitude' => $longitude]);
        return $latitude;
    }
    
}
