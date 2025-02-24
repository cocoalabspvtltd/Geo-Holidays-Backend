<?php

namespace App\Http\Controllers\Api;

use App\Classes\ApiResponseClass;
use App\Http\Controllers\Controller;
use App\Http\Resources\PackageCategoryResource;
use App\Interfaces\PackageCategoryRepositoryInterface;
use App\Models\PackageCategory;
use Illuminate\Http\Request;


class PackageController extends Controller
{
    private PackageCategoryRepositoryInterface $productRepositoryInterface;

    public function __construct(PackageCategoryRepositoryInterface $productRepositoryInterface)
    {
        $this->productRepositoryInterface = $productRepositoryInterface;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = $this->productRepositoryInterface->index();
        $responseData = [
            'data' => 'ajfhgj',
            'message' => '',
            'status' => 200
        ];

        return json_encode($responseData);

        // return ApiResponseClass::sendResponse(PackageCategoryResource::collection($data),'',200);
    }

}
