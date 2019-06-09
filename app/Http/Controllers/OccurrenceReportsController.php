<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Traits\CrudMethods;
use App\Services\OccurrenceReportService;
use App\Services\UserService;
use App\Validators\OccurrenceReportValidator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Http\Requests\ListAllOccurrenceOFAIntervalRequest;
use App\Http\Requests\CountOneOccurrenceOfAIntervalRequest;
use App\Http\Requests\CountOneOccurrenceOfMonthOfTheYearRequest;
use App\Http\Requests\ChangeStatusOccurrenceReports;
use App\OccurrenceReports;

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
        $month = $request->get('month');
        $idOccurrenceType = $request->get('idOccurrenceType');
        $data = array('year' => $year,
                      'month' => $month,
                      'idOccurrenceType' => $idOccurrenceType);
        $query = $this->service->getAllOfTheYear($data);

        return \response()->json($query, 200);
    }

    public function listOccurrenceOfAYearAgo(){
        $query = $this->service->listOccurrenceOfAYearAgo();
        return \response()->json($query, 200);
    }

    public function countOccurrenceOfEachType(ListAllOccurrenceOFAIntervalRequest $request){
        $date_start = $request->get('date_start');
        $date_end = $request->get('date_end');
        $data = $this->service->countOccurrenceOfEachType($date_start, $date_end);
        return \response()->json($data, 200);
    }

    public function countOccurrenceOfOneType(CountOneOccurrenceOfAIntervalRequest $request){
        $occurrence_id = $request->get('occurrence_id');    
        $date_start = $request->get('date_start');
        $date_end = $request->get('date_end');
        $data = $this->service->countOccurrenceOfOneType($occurrence_id, $date_start, $date_end);
        return response()->json($data, 200);
    }

    public function countAllOccurrenceOfMonthOfTheYear(CountOneOccurrenceOfMonthOfTheYearRequest $request){
        $month = $request->get('month');
        $year = $request->get('year');
        $data = $this->service->countAllOccurrenceOfMonthOfTheYear($month, $year);
        return response()->json($data, 200);
    }

    public function changeStatus(ChangeStatusOccurrenceReports $request){
        $occurrence_reports_id = $request->get('occurrence_reports_id');
        $status = $request->get('status');

        $occurrence_reports = new OccurrenceReports($occurrence_reports_id, $status);

        $this->service->changeStatus($occurrence_reports);

        return \response()->json('', 200);
     }
}
