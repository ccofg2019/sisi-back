<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Traits\CrudMethods;

use App\Repositories\IrregularityTypesRepository;
use App\Validators\IrregularityTypesValidator;

/**
 * Class IrregularityTypesController.
 *
 * @package namespace App\Http\Controllers;
 */
class IrregularityTypesController extends Controller
{
    use CrudMethods;

    /**
     * @var IrregularityTypesRepository
     */
    protected $repository;

    /**
     * @var IrregularityTypesValidator
     */
    protected $validator;

    /**
     * IrregularityTypesController constructor.
     *
     * @param IrregularityTypesRepository $repository
     * @param IrregularityTypesValidator $validator
     */
    public function __construct(IrregularityTypesRepository $repository,
                                IrregularityTypesValidator $validator)
    {
        $this->repository = $repository;
        $this->validator = $validator;
    }

}