<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\EmergencyRepository;
use App\Entities\Emergency;
use App\Validators\EmergencyValidator;
use App\Emergency as AppEmergency;

/**
 * Class EmergencyRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class EmergencyRepositoryEloquent extends BaseRepository implements EmergencyRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Emergency::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
    
    public function createNewEmergency($user_id){
        return $this->create(['user_id' => $user_id]);
    }

    public function changeStatus(AppEmergency $data){
        $id = $data->id;
        $status = $data->status;

        $this->update(['status' => $status], $id);
    }
}
