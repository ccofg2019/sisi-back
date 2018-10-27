<?php

namespace App\Services;

use App\Entities\IrregularityTypes;
use App\Repositories\IrregularityReportRepository;
use App\Services\Traits\CrudMethods;

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

// seria no caso as zonas, mas elas não foram definidas totalmente

    /** @var IrregularityTypesService  */
    protected $irregularityTypesService;

    /**
     * OccurrenceReportService constructor.
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
    ;


        if (isset($data['irregularity_type'])) {
                foreach ($data['irregularity_type'] as $irregularity_type) {
                    $report = IrregularityTypes::find($irregularity_type['name']['id']);
                    $report->irregularitytypes()->attach($irregularity_type['irregularity_type_id']);
                }


            return [
                "data" => [
                    "error"     => "false",
                    "message"   => "Irregularidade registrada com sucesso."
                ]
            ];
        } else {
            return [
                "data" => [
                    "error"     => "true",
                    "message"   => "Não foi possível registrar irregularidade."
                ]
            ];
        }


    }
}
