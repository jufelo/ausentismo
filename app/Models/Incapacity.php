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
    
    public function getTotalDiasAttribute()
    {
        //return date_diff($this->start_date, $this->end_date);
    }

    public function calcular_dias()
    {
        $this->total_per_day = $this->end_date-$this->start_date;
    }

    public function calcular_salario()
    {
        $this->salary_per_day = $this->salary / 30;
    }

    /**
     * Get the Incapacity_type for the employee.
     */


    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }

}
