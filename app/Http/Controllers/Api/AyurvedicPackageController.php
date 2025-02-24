<?php

namespace App\Http\Controllers\Api;

use App\Classes\ApiResponseClass;
use App\Http\Controllers\Controller;
use App\Http\Resources\AyurvedicPackageResource;
use App\Interfaces\AyurvedicPackageRepositoryInterface;
use Illuminate\Http\Request;

class AyurvedicPackageController extends Controller
{
    private AyurvedicPackageRepositoryInterface $ayurvedicpackagerepositorinterface;

    public function  __construct(AyurvedicPackageRepositoryInterface $ayurvedicpackagerepositorinterface)
    {
         $this->ayurvedicpackagerepositorinterface = $ayurvedicpackagerepositorinterface;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = $this->ayurvedicpackagerepositorinterface->index();

       return ApiResponseClass::sendResponse(AyurvedicPackageResource::collection($data),'',200);
    }
}
