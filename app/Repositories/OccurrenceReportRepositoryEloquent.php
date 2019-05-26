<?php

namespace App\Repositories;

use Illuminate\Support\Facades\DB;
use App\Presenters\OccurrenceReportPresenter;
use App\Services\Traits\SoftDeletes;
use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Entities\OccurrenceReport;
use App\Validators\OccurrenceReportValidator;

/**
 * Class OccurrenceReportRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class OccurrenceReportRepositoryEloquent extends BaseRepository implements OccurrenceReportRepository
{
    use SoftDeletes;

    /**
     * @var array
     */
    protected $fieldSearchable = [
        'zone_id',
        'occurrence_type_id',
        'status'
    ];

    /**
     * @var array
     */
    protected $fieldsRules = [
        'zone_id'               => ['numeric', 'max:2147483647'],
        'occurrence_type_id'    => ['numeric', 'max:2147483647'],
        'status'                => ['string', 20]
    ];

    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return OccurrenceReport::class;
    }

    /**
    * Specify Validator class name
    *
    * @return mixed
    */
    public function validator()
    {

        return OccurrenceReportValidator::class;
    }


    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }

    /**
     * @return mixed
     */
    public function presenter()
    {
        return OccurrenceReportPresenter::class;
    }

    /**
     * Find data by id
     *
     * @param int $id
     * @param array $columns
     * @param bool $skipPresenter
     * @return mixed
     * @throws \Prettus\Repository\Exceptions\RepositoryException
     */
    public function findDeleted($id, $columns = ['*'], $skipPresenter = false)
    {
        $this->applyCriteria();
        $this->applyScope();
        $model = $this->skipPresenter($skipPresenter)->model->withTrashed()->findOrFail($id, $columns);
        $this->resetModel();

        return $this->parserResult($model);
    }

    /**
     * Deleta o usuário completamente
     *
     * @param int $id
     * @return bool|null
     * @throws \Prettus\Repository\Exceptions\RepositoryException
     */
    public function forceDelete($id)
    {
        $model = $this->findDeleted($id, ['id'], true);

        $model->information()->forceDelete();

        return $model->forceDelete();
    }
    public function myList($idUser){
        return $this->findWhere(['user_id' => $idUser]);
    }

    public function getAllOfTheYear($year, $month, $idOccurrenceType){
        $data = array('months' => array(
            array('name' => 'Janeiro'  , 'numOccurrence' => 0),
            array('name' => 'Fevereiro', 'numOccurrence' => 0),
            array('name' => 'Março'    , 'numOccurrence' => 0),
            array('name' => 'Abril'    , 'numOccurrence' => 0),
            array('name' => 'Maio'     , 'numOccurrence' => 0),
            array('name' => 'Junho'    , 'numOccurrence' => 0),
            array('name' => 'Julho'    , 'numOccurrence' => 0),
            array('name' => 'Agosto'   , 'numOccurrence' => 0),
            array('name' => 'Setembro' , 'numOccurrence' => 0),
            array('name' => 'Outubro'  , 'numOccurrence' => 0),
            array('name' => 'Novembro' , 'numOccurrence' => 0),
            array('name' => 'Dezembro' , 'numOccurrence' => 0)            
        ));

        $filterWithMonthYear = $month != 0;
        if($filterWithMonthYear){
            $monthInArray = $month - 1;
            $query = $this->ListOccurrenceWithYearMonth($year, $month, $idOccurrenceType);            
            $data['months'][$monthInArray]['numOccurrence'] = \count($query['data']);
            // \var_dump($data['months'][8]);
            for($i = 0; $i <= 11; $i++){
                if($i != $monthInArray){
                    unset($data['months'][$i]);
                }
            }
            $newData = array('months' => array(
                array('name' => $data['months'][$monthInArray]['name'],
                      'numOccurrence' => $data['months'][$monthInArray]['numOccurrence'])
            ));
            $data = $newData;
        }else{
            for($i = 1; $i <= 12; $i++){            
                $query = $this->ListOccurrenceWithYearMonth($year, $i, $idOccurrenceType);
                $data['months'][$i - 1]['numOccurrence'] = \count($query['data']); 
            }
        }       
        
        return $data;        
    }

    public function ListOccurrenceWithYearMonth($year, $month, $idOccurrenceType){
        if($idOccurrenceType != 0){
            return $this->findWhere([
                [DB::raw('YEAR(occurrence_date)'), '=', $year],
                [DB::raw('MONTH(occurrence_date)'), '=', $month],
                ['occurrence_type_id', '=', $idOccurrenceType]          
            ]);    
        }
        return $this->findWhere([
            [DB::raw('YEAR(occurrence_date)'), '=', $year],
            [DB::raw('MONTH(occurrence_date)'), '=', $month]            
        ]);  
    }

    public function listOccurrenceOfAYearAgo(){
        $query = $this->findWhere([
            ['occurrence_date', '>=', DB::raw('DATE_SUB(CURDATE(),INTERVAL 1 YEAR)')],
            ['occurrence_date', '<=', DB::raw('date(NOW())')]
        ]);
        return $query;            
    }

    public function listAllOccurrenceOFAIntervalDate($idTypeOccurrence, $date_start, $date_end){
        $query = $this->findWhere([
            ['occurrence_type_id', '=',  $idTypeOccurrence],
            [DB::raw('date(occurrence_date)'),    '>=', $date_start],
            [DB::raw('date(occurrence_date)'),    '<=', $date_end]
        ]);
        return $query;
    }
}
