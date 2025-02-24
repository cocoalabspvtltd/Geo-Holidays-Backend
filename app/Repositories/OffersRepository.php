<?php

namespace App\Repositories;
use App\Models\Offers;
use App\Interfaces\OffersRepositoryInterface;

class OffersRepository implements OffersRepositoryInterface
{
    /**
     * Create a new class instance.
     */
    protected $model;

        public function __construct(Offers $model)
        {
        $this->model = $model;
        }

        public function index(){
            return Offers::all();
        }
}
