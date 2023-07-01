<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    
    use HasFactory;
    
    protected $guarded = ['id', 'status'];

    const PENDING = 1;
    const APPROVED = 2;
    const REJECTED = 3;
    const INITIALIZED = 4;
    const DONE = 5;

    public function getRouteKeyName(){
        return 'slug';
    }
    
    //Relationship one to many
    public function quotes(){
        return $this->hasMany(Quote::class);
    }

    public function invoices(){
        return $this->hasMany(Invoice::class);
    }

    //Relationship one to many (inverse)
    public function user(){
        return $this->belongsTo(User::class);
    }

    public function company(){
        return $this->belongsTo(Company::class);
    }

}
