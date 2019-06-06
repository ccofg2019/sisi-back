<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class PasswordRecovery.
 *
 * @package namespace App\Entities;
 */
class PasswordRecovery extends Model implements Transformable
{
    use TransformableTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'key',
        'user_id',
        'isValid'
    ];

    protected $table = 'password_recovery';

    public $timestamp = true;

    public function user(){
        return $this->belongsTo(App\Entities\User::class, 'user_id');
    }

}