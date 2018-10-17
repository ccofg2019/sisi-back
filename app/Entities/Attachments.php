<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class Attachments.
 *
 * @package namespace App\Entities;
 */
class Attachments extends Model implements Transformable
{
    use TransformableTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [

        'url',
        'attachable_type',
        'attachable_id',
        'user_id'

    ];



    protected $dates = [
        'create_at',
        'update_at',
        'deleted_at'
    ];

    public function attachments(){



    }

}
