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
            'id'                    => (int) $model->id,

            'url'                   => $model->url,
            'attachable_type'       => $model->attachable_type,
            'user_id'               => $model->user_id,
            'attachable_id'         => $model->attachable_id,

            'created_at'            => $model->created_at->toDateTimeString(),
            'updated_at'            => $model->updated_at->toDateTimeString()
        ];
    }
}
