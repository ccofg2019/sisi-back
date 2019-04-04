<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class Coordinate.
 *
 * @package namespace App\Entities;
 */
class Coordinate extends Model implements Transformable
{
    use TransformableTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
     protected $fillable = [
        'zone_id',
        'latitude',
        'longitude'
    ];

    protected $table = 'coordinates';

    public function zone(){
        return $this->belongsTo(Zone::class);
    }

    protected $timestamps = false; 
}
