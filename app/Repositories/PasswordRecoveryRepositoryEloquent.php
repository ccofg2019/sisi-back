<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\PasswordRecoveryRepository;
use App\Entities\PasswordRecovery;
use App\Validators\PasswordRecoveryValidator;

/**
 * Class PasswordRecoveryRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class PasswordRecoveryRepositoryEloquent extends BaseRepository implements PasswordRecoveryRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return PasswordRecovery::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
    
    public function store($keyHash, $userId){
        return $this->create(['key' => $keyHash, 'user_id' => $userId]);
    }

    public function UpdateColumnIsValidAllToUser($userId){
        return PasswordRecovery::where('user_id', '=', $userId)->update(array('isValid' => 'N'));
    }

    public function findKey($key){
        $data = $this->findWhere([
            ['key', '=', $key],
            ['isValid', '=', 'S']
        ]);

        if(!isset($data[0]))
            return null;

        return $data[0];
    }
}