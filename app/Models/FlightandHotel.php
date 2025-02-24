<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FlightandHotel extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'details', 'image'];
}
