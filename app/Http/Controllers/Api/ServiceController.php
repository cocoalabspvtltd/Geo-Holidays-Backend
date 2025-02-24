<?php

namespace App\Http\Controllers\Api;

use App\Classes\ApiResponseClass;
use App\Http\Controllers\Controller;
use App\Http\Resources\ServiceResource;
use App\Interfaces\ServiceRepositoryInterface;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    private ServiceRepositoryInterface $servicerepositorinterface;

    public function  __construct(ServiceRepositoryInterface $servicerepositorinterface)
    {
         $this->servicerepositorinterface = $servicerepositorinterface;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = $this->servicerepositorinterface->index();

       return ApiResponseClass::sendResponse(ServiceResource::collection($data),'',200);
    }
}
