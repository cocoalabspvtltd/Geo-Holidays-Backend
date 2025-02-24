<?php

namespace App\Repositories;

use App\Interfaces\ServiceRepositoryInterface;
use App\Models\Services;

class ServiceRepository implements ServiceRepositoryInterface
{
    protected $model;
    /**
     * Create a new class instance.
     */
    public function __construct(Services $model)
    {
    $this->model = $model;
    }

    public function index(){
        return Services::all();
    }
}
