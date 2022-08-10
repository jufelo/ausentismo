<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Incapacity_type extends Model
{
    use HasFactory;

    protected $fillable = [

        'name'
    ];   
    
    //Relationship
    public function incapacities()
    {
        return $this->belongsTo(Incapacity::class);
    }
    

}
