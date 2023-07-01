<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $guarded = ['id', 'status'];

    use HasFactory;

    const PENDING = 1;
    const APPROVED = 2;
    const REJECTED = 3;
    const INITIALIZED = 4;
    const DONE = 5;
}
