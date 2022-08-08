<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Incapacity extends Model
{
    use HasFactory;

    protected $fillable = [
        
        'employee_id',
        'incapacity_type_id',
        'cie_10_id',
        'start_date',
        'end_date',
        'clasification',

    ];   

    public function getFullNameAttribute()
    {
        return "{$this->name} {$this->lastname}";
    }
    
    public function getTotalDiasAttribute()
    {
        return ((strtotime($this->end_date) - strtotime($this->start_date)) / 60 / 60 / 24);
    }

    //Accidente de trabajo (4) y enfermedad laboral (5) 100% pagado por ARL
    public function getPagoArlAttribute()
    {
        if($this->incapacity_type_id == 4 || $this->incapacity_type_id == 5){

            return '$'.number_format(((strtotime($this->end_date) - strtotime($this->start_date)) / 60 / 60 / 24) * $this->employee->salary / 30, 2);
        }else{
            return '$'.'0.00';
        }
    }
    
    //Licencia de maternidad (2) 100% pagado por EPS 120 días, Licencia de paternidad (3) 100% pagado por EPS 14 días
    public function getPagoEpsAttribute()
    {
        if($this->incapacity_type_id == 2){
            return '$'.number_format((120) * $this->employee->salary / 30, 2);
        }else{
            if($this->incapacity_type_id == 3){
                return '$'.number_format((14) * $this->employee->salary / 30, 2);
            }
        
            return '$'.'0.00';
        
        }

        
    }
    
    
    /**
     * Relationships
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
