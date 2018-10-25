<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\IrregularityTypesRepository;
use App\Entities\IrregularityTypes;
use App\Validators\IrregularityTypesValidator;

/**
 * Class IrregularityTypesRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class IrregularityTypesRepositoryEloquent extends BaseRepository implements IrregularityTypesRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return IrregularityTypes::class;
    }

    /**
    * Specify Validator class name
    *
    * @return mixed
    */
    public function validator()
    {

        return IrregularityTypesValidator::class;
    }


    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
    
}
