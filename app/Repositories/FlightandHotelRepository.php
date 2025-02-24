<?php

namespace App\Repositories;

use App\Interfaces\FligtandHotelRepositoryInterface;
use App\Models\FlightandHotel;

class FlightandHotelRepository implements FligtandHotelRepositoryInterface
{

    protected $model;

    /**
     * Create a new class instance.
     */
    public function __construct(FlightandHotel $model)
    {
    $this->model = $model;
    }

    public function index(){
        return FlightandHotel::all();
    }
}
