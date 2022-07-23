<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'lastname',
        'ti',
        'identification',
        'salary',
        'position',
        'work_area',
        'eps',
        'arl',
        'afp',
    ];
/*
    // relacion uno a uno inversa
    public function user(){
        
        return $this->belongsTo('App\Models\User');
    }
    */
    /*
    public function getFullNameAtribute()
    {
        return "{$this->name} {$this->lastname}";
    }
    */
}


