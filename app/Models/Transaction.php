<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected $fillable= [
           'payment_id',
           'name',
           'email',
           'payment_method',
           'amount',
           'bank_name',
           'bank_transaction_id',
           'payment_status'
    ];
}
