<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PackageTour extends Model
{
    use HasFactory;
    protected $fillable =[

        'package_category_id',
        'title',
        'image',
        'package_rate',
        'description',
        'day_count',
       'night_count',
        'highlights',
       'inclusion',
        'exclusion',
        'status'
    ];
}
