<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Traits\CrudMethods;
use App\Services\OccurrenceReportService;
use App\Validators\OccurrenceReportValidator;

/**
 * Class OccurrenceReportsController.
 *
 * @package namespace App\Http\Controllers;
 */
class OccurrenceReportsController extends Controller
{
    use CrudMethods;

    /**
     * @var OccurrenceReportService
     */
    protected $service;

    /**
     * @var OccurrenceReportValidator
     */
    protected $validator;

    /**
     * OccurrenceReportsController constructor.
     *
     * @param OccurrenceReportService $service
     * @param OccurrenceReportValidator $validator
     */
    public function __construct(OccurrenceReportService $service,
                                OccurrenceReportValidator $validator)
    {
        $this->service   = $service;
        $this->validator = $validator;
    }
}
