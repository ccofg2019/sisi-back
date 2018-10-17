<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Entities\Attachments;

/**
 * Class AttachmentsTransformer.
 *
 * @package namespace App\Transformers;
 */
class AttachmentsTransformer extends TransformerAbstract
{
    /**
     * Transform the Attachments entity.
     *
     * @param \App\Entities\Attachments $model
     *
     * @return array
     */
    public function transform(Attachments $model)
    {
        return [
            'id'         => (int) $model->id,

            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}
