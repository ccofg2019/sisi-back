<?php

namespace App\Services;

use App\Repositories\OccurrenceReportRepository;
use App\Services\Traits\CrudMethods;

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

    }

    /**
     * @var OccurrenceReportRepository $repository
     */
    protected $repository;

    protected $involvedPeopleService;

    protected $occurrenceObjectService;

    /**
     * RoleService constructor.
     *
     * @param OccurrenceReportRepository $repository
     */
    public function __construct(OccurrenceReportRepository $repository,
                                InvolvedPeopleService $involvedPeopleService,
                                OccurrenceObjectService $occurrenceObjectService)
    {
        $this->repository = $repository;
        $this->involvedPeopleService = $involvedPeopleService;
        $this->occurrenceObjectService = $occurrenceObjectService;
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

    public function create(array $data)    {

        $occurrence_report = $this->processCreate($data);

        if(isset($occurrence_report)) {
            if (isset($data['involved_person'])) {
                foreach ($data['involved_person'] as $involved_people) {
                    $person[] = $this->involvedPeopleService->create(
                        array_merge($involved_people, ['occurrence_report_id' => $occurrence_report['data']['id']]));
                }
            }

            if (isset($data['occurrence_objects'])) {
                foreach ($data['occurrence_objects'] as $occurrence_object) {
                    $this->OccurrenceObjectService->create(
                        array_merge($occurrence_object, ['occurrence_report_id' => $occurrence_report['data']['id']])
                    );
                }
            }

            return [
                "error" => "false",
                "message" => "Ocorrêcia registrada com sucesso."
            ];
        } else {
            return [
                "error"     => "true",
                "message"   => "Não foi possível registrar ocorrência."
            ];
        }


    }

}