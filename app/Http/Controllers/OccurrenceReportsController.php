<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Traits\CrudMethods;
use App\Services\OccurrenceReportService;
use App\Services\UserService;
use App\Validators\OccurrenceReportValidator;
use Illuminate\Http\Request;

/**
 * Class OccurrenceReportsController.
 *
 * @package namespace App\Http\Controllers;
 */
class OccurrenceReportsController extends Controller
{
    use CrudMethods {
        store as public processStore;
    }

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

    public function myList(){
        $user = UserService::getUser(true);
        $idUser = $user->id;
        $myOccurrenceyReports = $this->service->myList($idUser);
        return \response()->json($myOccurrenceyReports, 200);

    }

    public function getAllOfTheYear(Request $request){
        $year = $request->get('year');
        
        $query = $this->service->getAllOfTheYear($year);

        return \response()->json($query, 200);
    }
}
