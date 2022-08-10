<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cie_10 extends Model
{
    use HasFactory;

    protected $fillable = [

        'code',
        'name'
    ];   
    
    public function getFullCieAttribute()
    {
        return "{$this->code} {$this->name}";
    }

    //Relationship
    public function incapacities()
    {
        return $this->hasmany(Incapacity::class);
    }

}
