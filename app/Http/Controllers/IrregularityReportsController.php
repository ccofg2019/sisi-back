<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Traits\CrudMethods;
use App\Services\IrregularityReportService;
use App\Services\UserService;
use Illuminate\Http\Request;
use App\Validators\IrregularityReportValidator;

/**
 * Class IrregularityReportsController.
 *
 * @package namespace App\Http\Controllers;
 */
class IrregularityReportsController extends Controller
{

    use CrudMethods{
        store as public processStore;
    }

    /**
     * @var IrregularityReportService
     */
    protected $service;

    /**
     * @var IrregularityReportValidator
     */
    protected $validator;

    /**
     * IrregularityReportsController constructor.
     *
     * @param IrregularityReportService $service
     * @param IrregularityReportValidator $validator
     */
    public function __construct(IrregularityReportService $service,
                                IrregularityReportValidator $validator)
    {
        $this->service    = $service;
        $this->validator  = $validator;
    }

    /**
     * @param Request $request
     * @return mixed
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function store(Request $request)
    {
        $user = UserService::getUser(true);

        app()->request->merge(['user_id' => $user->id]);
        return $this->processStore($request);
    }
}