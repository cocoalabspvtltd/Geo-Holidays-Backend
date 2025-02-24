<?php

namespace App\Http\Controllers\Api;

use App\Classes\ApiResponseClass;
use App\Http\Controllers\Controller;
use App\Http\Resources\OffersResource;
use App\Interfaces\OffersRepositoryInterface;
use Illuminate\Http\Request;

class OffersController extends Controller
{
    private OffersRepositoryInterface $officeRepositoryInterface;

    public function __construct(OffersRepositoryInterface $officeRepositoryInterface)
    {
        $this->officeRepositoryInterface = $officeRepositoryInterface;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = $this->officeRepositoryInterface->index();

       return ApiResponseClass::sendResponse(OffersResource::collection($data),'',200);
    }

}
