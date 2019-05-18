<?php

namespace App\Repositories;

use App\Presenters\IrregularityReportPresenter;
use App\Services\Traits\SoftDeletes;
use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\IrregularityReportRepository;
use App\Entities\IrregularityReport;
use App\Validators\IrregularityReportValidator;
use Illuminate\Support\Facades\DB;

/**
 * Class IrregularityReportRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class IrregularityReportRepositoryEloquent extends BaseRepository implements IrregularityReportRepository
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
        'irregularity_type_id'    => ['numeric', 'max:2147483647'],
        'status'                => ['string', 20]
    ];

    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return IrregularityReport::class;
    }

    /**
    * Specify Validator class name
    *
    * @return mixed
    */
    public function validator()
    {

        return IrregularityReportValidator::class;
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
        return IrregularityReportPresenter::class;
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

    public function getAllOfTheYear($year, $month, $idIrregularityType){
        $data = array('months' => array(
            array('name' => 'Janeiro'  , 'numIrregularity' => 0),
            array('name' => 'Fevereiro', 'numIrregularity' => 0),
            array('name' => 'Março'    , 'numIrregularity' => 0),
            array('name' => 'Abril'    , 'numIrregularity' => 0),
            array('name' => 'Maio'     , 'numIrregularity' => 0),
            array('name' => 'Junho'    , 'numIrregularity' => 0),
            array('name' => 'Julho'    , 'numIrregularity' => 0),
            array('name' => 'Agosto'   , 'numIrregularity' => 0),
            array('name' => 'Setembro' , 'numIrregularity' => 0),
            array('name' => 'Outubro'  , 'numIrregularity' => 0),
            array('name' => 'Novembro' , 'numIrregularity' => 0),
            array('name' => 'Dezembro' , 'numIrregularity' => 0)            
        ));

        $filterWithMonthYear = $month != 0;
        if($filterWithMonthYear){
            $monthInArray = $month - 1;
            $query = $this->ListIrregularityWithYearMonth($year, $month, $idIrregularityType);            
            $data['months'][$monthInArray]['numIrregularity'] = \count($query['data']);
            // \var_dump($data['months'][8]);
            for($i = 0; $i <= 11; $i++){
                if($i != $monthInArray){
                    unset($data['months'][$i]);
                }
            }
            $newData = array('months' => array(
                array('name' => $data['months'][$monthInArray]['name'],
                      'numIrregularity' => $data['months'][$monthInArray]['numIrregularity'])
            ));
            $data = $newData;
        }else{
            for($i = 1; $i <= 12; $i++){            
                $query = $this->ListIrregularityWithYearMonth($year, $i, $idIrregularityType);
                $data['months'][$i - 1]['numIrregularity'] = \count($query['data']); 
            }
        }
        return $data;   
    }

    public function ListIrregularityWithYearMonth($year, $month, $idIrregularityType){
        if($idIrregularityType != 0){
            return $this->findWhere([
                [DB::raw('YEAR(created_at)'), '=', $year],
                [DB::raw('MONTH(created_at)'), '=', $month],
                ['irregularity_type_id', '=', $idIrregularityType]          
            ]);    
        }
        return $this->findWhere([
            [DB::raw('YEAR(created_at)'), '=', $year],
            [DB::raw('MONTH(created_at)'), '=', $month]            
        ]); 
    }
    public function listAllirregularityOFAIntervalDate($idTypeirregularity, $date_start, $date_end){
        $query = $this->findWhere([
            ['irregularity_type_id', '=',  $idTypeirregularity],
            [DB::raw('date(created_at)'),    '>=', $date_start],
            [DB::raw('date(created_at)'),    '<=', $date_end]
        ]);
        return $query;
    }
}