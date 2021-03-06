<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OccurrenceReports extends Model
{
    public $id;
    public $status;

    public function __construct($id, $status)
    {
        $this->id = $id;
        $this->status = $status;
    }
}
