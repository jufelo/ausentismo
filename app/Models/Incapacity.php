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
        'cie_10_id',
        'incapacity_type_id',
        'employee_id',

    ];   

    public function getFullNameAttribute()
    {
        return "{$this->name} {$this->lastname}";
    }
    
    public function getTotalDiasAttribute()
    {
        return ((strtotime($this->end_date) - strtotime($this->start_date)) / 60 / 60 / 24);
    }

    //Accidente de trabajo 4 y enfermedad laboral 5 100%
    public function pago_arl()
    {
        return $this->total_dias * $this->salario / 30;
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

    public function incapacity_type()
    {
        return $this->belongsTo(Incapacity_type::class);
    }

    public function cie_10()
    {
        return $this->belongsTo(Cie_10::class);
    }
}
