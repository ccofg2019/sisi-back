<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class PositionEmergency.
 *
 * @package namespace App\Entities;
 */
class PositionEmergency extends Model implements Transformable
{
    use TransformableTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
     public $fillable = [
        'emergency_id',
        'latitude',
        'longitude'
    ];

    protected $table = 'position_emergencies';

    public $timestamp = true;

    public function emergency(){
        return $this->belongsTo(Emergency::class);
    }
}
