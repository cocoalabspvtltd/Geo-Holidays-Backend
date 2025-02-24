<?php

namespace App\Http\Controllers\Api;

use App\Classes\ApiResponseClass;
use App\Http\Controllers\Controller;
use App\Http\Resources\FlightandHotelResource;
use App\Interfaces\FligtandHotelRepositoryInterface;
use Illuminate\Http\Request;

class FlightandHotelController extends Controller
{
    private FligtandHotelRepositoryInterface $flightandhotelrepositoryinterface;

    public function  __construct(FligtandHotelRepositoryInterface $flightandhotelrepositoryinterface)
    {
         $this->flightandhotelrepositoryinterface = $flightandhotelrepositoryinterface;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = $this->flightandhotelrepositoryinterface->index();

       return ApiResponseClass::sendResponse(FlightandHotelResource::collection($data),'',200);
    }

}
