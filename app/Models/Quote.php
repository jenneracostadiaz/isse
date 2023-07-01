<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quote extends Model
{

    protected $guarded = ['id', 'status'];

    use HasFactory;
    
    const PENDING = 1;
    const REVIEWING = 2;
    const APPROVED = 3;
    const IN_PROGRESS = 4;
    const COMPLETED = 5;

    //Relationship one to many (inverse)
    public function project(){
        return $this->belongsTo(Project::class);
    }

    public function company(){
        return $this->belongsTo(Company::class);
    }
    
    
}
