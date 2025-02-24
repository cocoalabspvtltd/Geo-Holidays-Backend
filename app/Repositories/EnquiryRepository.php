<?php

namespace App\Repositories;

use App\Interfaces\EnquiryRepositoryInterface;
use App\Models\Enquiry;

class EnquiryRepository implements EnquiryRepositoryInterface
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        //
    }

    public function store(array $data){
        return Enquiry::create($data);
     }

}
