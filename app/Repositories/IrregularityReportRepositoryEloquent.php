<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\IrregularityReportRepository;
use App\Entities\IrregularityReport;
use App\Validators\IrregularityReportValidator;

/**
 * Class IrregularityReportRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class IrregularityReportRepositoryEloquent extends BaseRepository implements IrregularityReportRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return IrregularityReport::class;
    }

    /**
    * Specify Validator class name
    *
    * @return mixed
    */
    public function validator()
    {

        return IrregularityReportValidator::class;
    }


    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
    
}
