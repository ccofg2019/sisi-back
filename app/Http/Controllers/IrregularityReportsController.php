<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Traits\CrudMethods;
use App\Services\UserService;
use App\Validators\IrregularityReportValidator;
use App\Services\IrregularityReportService;
use Illuminate\Http\Request;

/**
 * Class IrregularityReportsController.
 *
 * @package namespace App\Http\Controllers;
 */
class IrregularityReportsController extends Controller
{

    use CrudMethods{
        store as protected processStore;
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
        \var_dump($request->get('title'));
        $user = UserService::getUser(true);

        app()->request->merge(['user_id' => $user->id]);
        return $this->processStore($request);
    }

    public function myList(){
        $user = UserService::getUser(true);
        $idUser = $user->id;
        $myIrregularityReports = $this->service->myList($idUser);
        return \response()->json($myIrregularityReports, 200);

    }

    public function getAllOfTheYear(Request $request){
        $year = $request->get('year');
        $month = $request->get('month');
        $idOccurrenceType = $request->get('idIrregularityType');
        $data = array('year' => $year,
                      'month' => $month,
                      'idIrregularityType' => $idOccurrenceType);        
        $query = $this->service->getAllOfTheYear($data);

        return \response()->json($query, 200);
    }
}