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

    public function getFullNameAtribute()
    {
        return "{$this->name} {$this->lastname}";
    }
    
    /**
     * Get the Incapacity_type for the employee.
     */

    

    public function incapacity_type()
    {
        return $this->hasMany(Incapacity_type::class);
    }
}
