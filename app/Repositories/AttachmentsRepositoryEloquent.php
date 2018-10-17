<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\attachmentsRepository;
use App\Entities\Attachments;
use App\Validators\AttachmentsValidator;

/**
 * Class AttachmentsRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class AttachmentsRepositoryEloquent extends BaseRepository implements AttachmentsRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Attachments::class;
    }

    /**
    * Specify Validator class name
    *
    * @return mixed
    */
    public function validator()
    {

        return AttachmentsValidator::class;
    }


    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
    
}
