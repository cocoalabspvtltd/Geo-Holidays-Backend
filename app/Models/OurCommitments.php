<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OurCommitments extends Model
{
    use HasFactory;

    protected $fillable=['title','description','icon_image'];
}
