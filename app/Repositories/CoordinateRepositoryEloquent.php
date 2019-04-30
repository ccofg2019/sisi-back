<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\CoordinateRepository;
use App\Entities\Coordinate;
use App\Validators\CoordinateValidator;

/**
 * Class CoordinateRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class CoordinateRepositoryEloquent extends BaseRepository implements CoordinateRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Coordinate::class;
    }

    /**
    * Specify Validator class name
    *
    * @return mixed
    */
    public function validator()
    {

        return CoordinateValidator::class;
    }


    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
    
}
