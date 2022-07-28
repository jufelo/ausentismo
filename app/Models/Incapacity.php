<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Incapacity extends Model
{
    use HasFactory;

    protected $fillable = [
        'start_date',
        'end_date',
        'clasification',
        'incapacity_type_id',
        'employee_id',

    ];   

    public function getFullNameAttribute()
    {
        return "{$this->name} {$this->lastname}";
    }
    
    /**
     * Get the Incapacity_type for the employee.
     */


    //RELACION DE UNO A UNO CON USUARIO
    public function user()
    {
        return $this->hasOne(Incapacity::class);
    }
}
