<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $guarded = ['id'];

    use HasFactory;

    //Relationship one to many
    public function projects(){
        return $this->hasMany(Project::class);
    }

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

    //Relationship many to many
    public function users(){
        return $this->belongsToMany(User::class);
    }
}
