<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\ZoneService;

class ZonesController extends Controller
{
    //

    protected $service;

    public function __construct(ZoneService $service)
    {
        $this->service = $service;
    }

    public function index(){
        $data = $this->service->functionListZonesRecife();
        return response()->json($data, 200);
    }

}
