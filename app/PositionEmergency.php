<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PositionEmergency extends Model
{
    //
    public $emergency_id;
    public $latitude;
    public $longitude;

    public function __construct($emergency_id, $latitude, $longitude)
    {
        $this->emergency_id = $emergency_id;
        $this->latitude = $latitude;
        $this->longitude = $longitude;
    }
}
