<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AyurvedicPackages extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'sub_title',
        'activity_details',
        'treatments',
        'image'
    ];
}
