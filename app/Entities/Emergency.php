<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class Emergency.
 *
 * @package namespace App\Entities;
 */
class Emergency extends Model implements Transformable
{
    use TransformableTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
     public $fillable = [
        'user_id',
        'agent_id',
        'status'
    ];

    protected $table = 'emergencies';

    public $timestamp = true;

    public function positionEmergencies(){
        return $this->hasMany(PositionEmergency::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function agent(){
        return $this->belongsTo(User::class);
    }
}
