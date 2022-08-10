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
    
    public function getSalarioMinimoAttribute(){
        return 1000000;
    }


    public function getPagoempleadorAttribute()
    {
    
        // 1-Enfermedad común o 7-Accidente de tránsito 100% pagado por Empleador del día 1 al 2
        if($this->incapacity_type_id == 1 || $this->incapacity_type_id == 7){
            if($this->total_dias >= 1 && $this->total_dias <= 2){

                return '$'.number_format($this->total_dias * $this->employee->salary / 30, 2);
            }else{
                return '$'.'0.00';
            }

        }else{
            return '$'.'0.00';
        }
    }
    
    public function getPagoEpsAttribute()
    {
    
        // 1-Enfermedad común 66.67% pagado por EPS del día 3 al 180
        // 1-Enfermedad común 50% pagado por EPS del día 541 en adelante (según la perdida de capacidad laboral asumido por la EPS)

        if($this->incapacity_type_id == 1){
            if($this->total_dias >= 3 && $this->total_dias <= 180){

                //Cuando el trabajador devenga un salario mínimo las incapacidades no se pueden pagar por un valor menor
                if($this->employee->salary > $this->salario_minimo){
                    return '$'.number_format($this->total_dias * $this->employee->salary / 30 * 0.667, 2); // porcentaje en requerimiento
                }else{
                    return '$'.number_format($this->total_dias * $this->employee->salary / 30, 2);

                }
            }
            if($this->total_dias >= 541){
                if($this->employee->salary > $this->salario_minimo){
                    return '$'.number_format($this->total_dias * $this->employee->salary / 30 * 0.5, 2);
                }else{
                    return '$'.number_format($this->total_dias * $this->employee->salary / 30, 2);

                }
            }    
        }

        // 2-Licencia de maternidad 100% pagado por EPS 120 días

        if($this->incapacity_type_id == 2){
            return '$'.number_format((120) * $this->employee->salary / 30, 2);
        }

            //3-Licencia de paternidad 100% pagado por EPS 14 días
        if($this->incapacity_type_id == 3){
            return '$'.number_format((14) * $this->employee->salary / 30, 2);
        }

        // 7-Accidente de tránsito 67% pagado  por EPS del día 3 al 180 días (de acuerdo al tipo de incapacidad asumido)
        if($this->incapacity_type_id == 7){
            if($this->total_dias >= 3 && $this->total_dias <= 180){
                if($this->employee->salary > $this->salario_minimo){
                    return '$'.number_format($this->total_dias * $this->employee->salary / 30 * 0.67, 2); //porcentaje en requerimiento
                    }else{
                        return '$'.number_format($this->total_dias * $this->employee->salary / 30, 2);

                    }
            }
            
        }
        return '$'.'0.00';

    }

    // 4-Accidente de trabajo o 5-enfermedad laboral 100% pagado por ARL
    public function getPagoArlAttribute()
    {
        if($this->incapacity_type_id == 4 || $this->incapacity_type_id == 5){

            return '$'.number_format($this->total_dias * $this->employee->salary / 30, 2);
        }else{
            return '$'.'0.00';
        }
    }

    public function getPagoAfpAttribute()
    {
        // 1-Enfermedad común 50% pagado por AFP del día 181 al 541

        if($this->incapacity_type_id == 1){
            if($this->total_dias >= 181 && $this->total_dias <= 540){
                if($this->employee->salary > $this->salario_minimo){
                    return '$'.number_format($this->total_dias * $this->employee->salary / 30 * 0.5, 2);
                    }else{
                        return '$'.number_format($this->total_dias * $this->employee->salary / 30, 2);

                    }
            }else{
                return '$'.'0.00';
            }
        }else{
            return '$'.'0.00';
        }
    }

    //Relationship
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
