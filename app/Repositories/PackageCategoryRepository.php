<?php

namespace App\Repositories;

use App\Interfaces\PackageCategoryRepositoryInterface;
use App\Models\PackageCategory;

class PackageCategoryRepository implements PackageCategoryRepositoryInterface
{
        public function index(){
            return PackageCategory::all();
        }

        
}
