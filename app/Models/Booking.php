<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'package_id',
        'email',
        'phone_number',
        'depacture_city',
        'prefferd_date',
        'members_count',
        'adult_count',
        'child_count',
        'infant_count'
    ];
}
