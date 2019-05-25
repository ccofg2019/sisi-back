<?php

namespace App\Services;

use App\Entities\AuditLog;
use App\Entities\OccurrenceReport;
use App\Repositories\OccurrenceReportRepository;
use App\Services\Traits\CrudMethods;
use Illuminate\Support\Facades\DB;
use App\Repositories\OccurrenceTypeRepository;
use App\Services\OccurrenceTypeService;

/**
 * Class UserService
 *
 * @package App\Services
 */
class OccurrenceReportService extends AppService
{
    use CrudMethods {
        all    as protected processAll;
        create as protected processCreate;
        update as protected processUpdate;
    }

    /** @var OccurrenceReportRepository  */
    protected $repository;

    /** @var InvolvedPeopleService  */
    protected $involvedPeopleService;

    /** @var OccurrenceObjectService  */
    protected $occurrenceObjectService;

    protected $occurenceTypeRepository;

    protected $occurrenceTypeService;

    /**
     * OccurrenceReportService constructor.
     *
     * @param OccurrenceReportRepository $repository
     * @param InvolvedPeopleService $involvedPeopleService
     * @param OccurrenceObjectService $occurrenceObjectService
     */
    public function __construct(OccurrenceReportRepository $repository,
                                InvolvedPeopleService $involvedPeopleService,
                                OccurrenceObjectService $occurrenceObjectService,
                                OccurrenceTypeRepository $occurenceTypeRepository,
                                OccurrenceTypeService $occurrenceTypeService
                                )
    {
        $this->repository              = $repository;
        $this->involvedPeopleService   = $involvedPeopleService;
        $this->occurrenceObjectService = $occurrenceObjectService;
        $this->occurenceTypeRepository = $occurenceTypeRepository;
        $this->occurrenceTypeService = $occurrenceTypeService;
    }

    /**
     * Display a listing of the resource.
     *
     * @param $limit
     * @return array|mixed
     */
    public function all($limit = 20)
    {
        $this->repository
            ->resetCriteria()
            ->pushCriteria(app('App\Criterias\AppRequestCriteria'));

        return $this->processAll($limit);
    }

    /**
     * @param array $data
     * @return mixed
     */
    public function create(array $data)
    {
        $result = DB::transaction(function () use ($data) {
            try{
                $occurrence_report = $this->processCreate($data);

                if (isset($data['involved_people'])) {
                    foreach ($data['involved_people'] as $involved_people) {
                        $people = array_merge($involved_people, ['occurrence_report_id' => $occurrence_report['data']['id']]);
                        $person[] = $this->involvedPeopleService->create($people);
                    }
                }

                if (isset($data['occurrence_objects'])) {
                    foreach ($data['occurrence_objects'] as $occurrence_object) {
                        $report = OccurrenceReport::find($occurrence_report['data']['id']);
                        $report->objects()->attach($occurrence_object['object_id']);
                    }
                }

                if(!isset($occurrence_report)) {
                    throw new \Exception('Erro ao tentar realizar cadastro da ocorrẽncia!');
                }


                AuditLogService::write('criou boletim de ocorrência', AuditLog::LOGGABLE_TYPE_OCCURRENCE, $occurrence_report['data']['id']);

                return [
                    "data" => [
                        "error"     => "false",
                        "message"   => "Ocorrêcia registrada com sucesso."
                    ]
                ];
            } catch (\Exception $e) {
                return [
                    "data" => [
                        "error"     => "true",
                        "message"   => $e->getMessage()
                    ]
                ];
            }
        });

        return $result;
    }

    public function update(array $data, $id)
    {
        $zone = $this->processUpdate($data, $id);
        AuditLogService::write('editou boletim de ocorrência', AuditLog::LOGGABLE_TYPE_OCCURRENCE   ,  $id);

        return $zone;
    }
    public function myList($idUser){
        return $this->repository->myList($idUser);

    }

    public function getAllOfTheYear($data){
        $year = $data['year'];
        $month = $data['month'];     
        $idOccurrenceType = $data['idOccurrenceType'];   
        return $this->repository->getAllOfTheYear($year, $month, $idOccurrenceType);
    }

    public function listOccurrenceOfAYearAgo(){
        return $this->repository->listOccurrenceOfAYearAgo();
    }

    public function countOccurrenceOfEachType($date_start, $date_end){
        $dataOccurrenceType = $this->occurenceTypeRepository->all();
        $data = array();
        $lengthDataOccurrenceType = \sizeof($dataOccurrenceType['data']);
        
        for($i = 0; $i < $lengthDataOccurrenceType; $i++){
            $occurenceType = $dataOccurrenceType['data'][$i];
            $idOccurrenceType = $occurenceType['id'];
            $nameOccurrenceType = $occurenceType['name'];
            
            $dataListOccurrence = $this->repository->listAllOccurrenceOFAIntervalDate($idOccurrenceType, $date_start, $date_end);
            
            $lengthDataListOccurrence = \sizeof($dataListOccurrence['data']);

            $dataBuild = array(
                'OccurrenceType' => array(
                    'idTypeOccurrence'                  => $idOccurrenceType,
                    'nameTypeOccurrence'                => $nameOccurrenceType,
                    'numberOfOccurrences' => $lengthDataListOccurrence
                )
            );

            \array_push($data, $dataBuild['OccurrenceType']);
        }
        return $data;
    }

    public function countOccurrenceOfOneType($occurrence_id, $date_start, $date_end){
        $dataOccurrenceType = $this->occurrenceTypeService->findWhere([
            ['id', '=', $occurrence_id]
        ]);
        $dataListOccurrence = $this->repository->listAlloccurrenceOFAIntervalDate($dataOccurrenceType[0]->id, $date_start, $date_end);
        $lengthDataListOccurrence = \sizeof($dataListOccurrence['data']);

        $dataBuild = array(
            'idTypeOccurrence'    => $occurrence_id,
            'nameTypeOccurrence'  => $dataOccurrenceType[0]->name,
            'numberOfOccurrences' => $lengthDataListOccurrence
        );
        
        return $dataBuild;
    }
}
