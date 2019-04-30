<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Entities\Coordinate;

/**
 * Class CoordinateTransformer.
 *
 * @package namespace App\Transformers;
 */
class CoordinateTransformer extends TransformerAbstract
{
    /**
     * Transform the Coordinate entity.
     *
     * @param \App\Entities\Coordinate $model
     *
     * @return array
     */
    public function transform(Coordinate $model)
    {
        return [
            'id'         => (int) $model->id,

            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}
