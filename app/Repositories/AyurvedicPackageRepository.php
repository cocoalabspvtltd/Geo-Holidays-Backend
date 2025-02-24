<?php

namespace App\Repositories;

use App\Interfaces\AyurvedicPackageRepositoryInterface;
use App\Models\AyurvedicPackages;

class AyurvedicPackageRepository implements AyurvedicPackageRepositoryInterface
{

    protected $model;
    /**
     * Create a new class instance.
     */
    public function __construct(AyurvedicPackages $model)
    {
    $this->model = $model;
    }

    public function index(){
        return AyurvedicPackages::all();
    }
}
