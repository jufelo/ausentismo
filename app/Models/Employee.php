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

    public function getFullNameAttribute()
    {
        return "{$this->name} {$this->lastname}";
    }
    
    public function getSalarioAttribute()
    {
        
        return number_format($this->salary);
    }
    
    public function getSalarioPorDiaAttribute()
    {
        
        return number_format($this->salary / 30, 2);
    }


    public function incapacities()
    {
        return $this->hasMany(Incapacity::class);
    }
    
}


