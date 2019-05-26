<?php

namespace App\Services;

use App\Repositories\IrregularityReportRepository;
use App\Services\Traits\CrudMethods;
use App\Repositories\IrregularityTypesRepository;


/**
 * Class UserService
 *
 * @package App\Services
 */
class IrregularityReportService extends AppService
{
    use CrudMethods {
        all    as protected processAll;
        create as protected processCreate;
    }

    /** @var IrregularityReportRepository  */
    protected $repository;

    /** @var IrregularityTypesService  */
    protected $irregularityTypesService;

    /**
     * IrregularityReportService constructor.
     *
     * @param IrregularityReportRepository $repository
     * @param IrregularityTypesService $irregularityTypesService
     */
    public function __construct(IrregularityReportRepository $repository,
    IrregularityTypesService $irregularityTypesService)
    {
        $this->repository               = $repository;
        $this->irregularityTypesService = $irregularityTypesService;
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
            ->orderBy('id', 'desc')
            ->resetCriteria()
            ->pushCriteria(app('App\Criterias\AppRequestCriteria'));

        return $this->processAll($limit);
    }

    /**
     * @param array $data
     * @return array
     */
    public function create(array $data)
    {
        // Adicionar attachment and log

        return $this->processCreate($data);
    }

   public function myList($idUser){
       return $this->repository->myList($idUser);
   }

   public function getAllOfTheYear($data){
       $year = $data['year'];
       $month = $data['month'];     
       $idIrregularityType = $data['idIrregularityType'];   
       return $this->repository->getAllOfTheYear($year, $month, $idIrregularityType);
   }

   public function countIrregularityOfEachType($date_start, $date_end){
    $dataIrregularityType = $this->irregularityTypesService->all();
    $data = array();
    $lengthDataIrregularityType = \sizeof($dataIrregularityType['data']);
    
    for($i = 0; $i < $lengthDataIrregularityType; $i++){
        $irregularityType = $dataIrregularityType['data'][$i];
        $idIrregularityType = $irregularityType['id'];
        $nameIrregularityType = $irregularityType['name'];
        
        $dataListIrregularity = $this->repository->listAllIrregularityOFAIntervalDate($idIrregularityType, $date_start, $date_end);
        
        $lengthDataListIrregularity = \sizeof($dataListIrregularity['data']);

        $dataBuild = array(
            'IrregularityType' => array(
                'idTypeIrregularity'                  => $idIrregularityType,
                'nameTypeIrregularity'                => $nameIrregularityType,
                'numberOfIrregularitys' => $lengthDataListIrregularity
            )
        );

        \array_push($data, $dataBuild['IrregularityType']);
    }
    return $data;
}

    public function countIrregularityOfOneType($irregularity_id, $date_start, $date_end){
        $dataIrregularityType = $this->irregularityTypesService->findWhere([
            ['id', '=', $irregularity_id]
        ]);
        $dataListIrregularity = $this->repository->listAllirregularityOFAIntervalDate($dataIrregularityType[0]->id, $date_start, $date_end);
        $lengthDataListIrregularity = \sizeof($dataListIrregularity['data']);

        $dataBuild = array(
            'idTypeIrregularity'    => $irregularity_id,
            'nameTypeIrregularity'  => $dataIrregularityType[0]->name,
            'numberOfIrregularitys' => $lengthDataListIrregularity
        );
        
        return $dataBuild;
    }

    public function countAllIrregularityOfMonthOfTheYear($month, $year){
        
        $dataIrregularityType = $this->irregularityTypesService->all();
        $data = array();
        $lengthDataIrregularityType = \sizeof($dataIrregularityType['data']);
        for($i = 0; $i < $lengthDataIrregularityType; $i++){
            $irregularityType = $dataIrregularityType['data'][$i];
            $idIrregularityType = $irregularityType['id'];
            $nameIrregularityType = $irregularityType['name'];
            $dataListIrregularity = $this->repository->ListIrregularityWithYearMonth($year, $month, $idIrregularityType);
            $lengthDataListIrregularity = \sizeof($dataListIrregularity['data']);
    
            $dataBuild = array(
                'IrregularityType' => array(
                    'idTypeIrregularity'                  => $idIrregularityType,
                    'nameTypeIrregularity'                => $nameIrregularityType,
                    'numberOfIrregularitys' => $lengthDataListIrregularity
                )
            );
    
            \array_push($data, $dataBuild['IrregularityType']);
        }
        return $data;
    }
}
