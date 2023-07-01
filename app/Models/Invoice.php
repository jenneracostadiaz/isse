<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{

    protected $guarded = ['id', 'status'];

    use HasFactory;

    const PENDING = 1;
    const GENERATED = 2;
    const PAID = 3;
    const UNPAID = 4;

}
