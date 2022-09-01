<?php

namespace App\Http\Livewire\Administrador;

use App\Models\Employee;
use App\Models\Incapacity;
use Livewire\Component;
use RealRashid\SweetAlert\Facades\Alert;

class IncapacityCreate extends Component
{

    public $name;
    public $lastname;
    public $incapacity_types;
    public $incapacity_type;
    public $start_date;
    public $end_date;
    public $clasification;
    public $total_per_day;
    public $salary_per_day;
    public $salary;
    public $Employees;
    public $employees;
    public $employee;
    
    public $listaIncapacidades;
    public $employee_id;
    public $incapacity_type_id;
    public $cie_10s;
    public $cie_10;
    public $cie_10_id;

    public $salario_minimo_diario = 1000000/30;
    public $paid_company;
    public $paid_eps;
    public $paid_arl;
    public $paid_afp;
    public $paid_total;

    protected $listeners = ['refresh' => 'calcular_pago'];

    protected $rules =
    [
        'employee_id' => 'required',
        'start_date' => 'required',
        'end_date' => 'required',
        'incapacity_type_id' => 'required',
        'clasification' => 'required',
        'cie_10_id' => 'required',
        
    ];

    protected $messages = [
        'employee_id.required' => 'El empleado es requerido',
        'incapacity_type_id.required' => 'El tipo es requerido',
        'start_date.required' => 'La fecha inicial es requerida',
        'end_date.required' => 'La fecha final es requerida',
        'name.required' => 'El nombre es requerido.',
        'lastname.required' => 'El apellido es requerido.',
        'clasification.required' => 'La clasificación es requerida.',
        'salary.required' => 'El salario es requerido.',
        'cie_10_id.required' => 'El diagnóstico es requerido.',
    ];

    public function updatedName()
    {
        $this->validate([
            'incapacity_type' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
            'clasification' => 'required',

          ]);
    }

    public function calcular_dias()
    {
        if(strtotime($this->end_date) >= strtotime($this->start_date) && strtotime($this->start_date) != null && strtotime($this->end_date) != null && strtotime($this->start_date) >= 946684800){
            $this->total_per_day = ((strtotime($this->end_date) - strtotime($this->start_date)) / 86400);

        }else{
            $this->total_per_day = '';
        }

    $this->emit("refresh");
    }

    public function calcular_salario($value)
    {
        $employees = Employee::find($value);
        if($employees){
            $this->salary_per_day = $employees->salary / 30;
        }else{
            $this->salary_per_day = 0.00;
        }
        
    $this->emit('refresh');    
    }
    
    public function calcular_pago(){
        $this->paid_company = 0.00;
        $this->paid_eps = 0.00;
        $this->paid_arl = 0.00;
        $this->paid_afp = 0.00;

        // 1-Enfermedad común 100% pagado por Empleador del día 1 al 2
        if($this->incapacity_type_id == 1){
            if($this->total_per_day >= 1 && $this->total_per_day <= 2){

                $this->paid_company = $this->total_per_day * $this->salary_per_day;
            }
        

            // 1-Enfermedad común 66.67% pagado por EPS del día 3 al 180
            elseif($this->total_per_day >= 3 && $this->total_per_day <= 180){

                //Cuando el trabajador devenga un salario mínimo las incapacidades no se pueden pagar por un valor menor
                if($this->salary_per_day > $this->salario_minimo_diario){
                    $this->paid_company = 2 * $this->salary_per_day;
                    $this->paid_eps = ($this->total_per_day-2) * $this->salary_per_day * 0.667; // porcentaje en requerimiento
                    
                }else{
                    $this->paid_company = 2 * $this->salary_per_day;
                    $this->paid_eps = ($this->total_per_day-2) * $this->salary_per_day; 

                }
            }

            // 1-Enfermedad común 50% pagado por AFP del día 181 al 540
            elseif($this->total_per_day >= 181 && $this->total_per_day <= 540){
                if($this->salary_per_day > $this->salario_minimo_diario){
                    $this->paid_company = 2 * $this->salary_per_day;
                    $this->paid_eps = 180 * $this->salary_per_day * 0.667; // porcentaje en requerimiento
                    $this->paid_afp = ($this->total_per_day-180) * $this->salary_per_day * 0.5;
                    }else{
                        $this->paid_company = 2 * $this->salary_per_day;
                        $this->paid_eps = 180 * $this->salary_per_day;
                        $this->paid_afp = ($this->total_per_day-180) * $this->salary_per_day;

                    }
            }

            // 1-Enfermedad común 50% pagado por EPS del día 541 en adelante (según la perdida de capacidad laboral asumido por la EPS)
            elseif($this->total_per_day >= 541){
                if($this->salary_per_day > $this->salario_minimo_diario){
                    $this->paid_company = 2 * $this->salary_per_day;
                    $this->paid_afp = 540 * $this->salary_per_day * 0.5;
                    $this->paid_eps = 180 * $this->salary_per_day * 0.667 + ($this->total_per_day-540) * $this->salary_per_day * 0.5; // porcentaje en requerimiento
                }else{
                    $this->paid_eps = $this->total_per_day * $this->salary_per_day;
                    $this->paid_afp = 540 * $this->salary_per_day;
                    $this->paid_eps = 180 * $this->salary_per_day + ($this->total_per_day-540) * $this->salary_per_day; // porcentaje en requerimiento
                }
            }    
        }

        // 2-Licencia de maternidad 100% pagado por EPS 120 días
        elseif($this->incapacity_type_id == 2){
            $this->paid_eps = 120 * $this->salary_per_day;
        }

        //3-Licencia de paternidad 100% pagado por EPS 14 días
        elseif($this->incapacity_type_id == 3){
            $this->paid_eps = 14 * $this->salary_per_day;
        }
        
        //dd($this->salary_per_day);
        // 4-Accidente de trabajo o 5-enfermedad laboral 100% pagado por ARL
        elseif($this->incapacity_type_id == 4 || $this->incapacity_type_id == 5){

            $this->paid_arl = $this->total_per_day * $this->salary_per_day;
        }
        
        // 7-Accidente de tránsito 100% pagado por Empleador del día 1 al 2
        elseif($this->incapacity_type_id == 7){
            if($this->total_per_day >= 1 && $this->total_per_day <= 2){

                $this->paid_company = $this->total_per_day * $this->salary_per_day;
            }

            // 7-Accidente de tránsito 67% pagado  por EPS del día 3 al 180 días (de acuerdo al tipo de incapacidad asumido)
            elseif($this->total_per_day >= 3 && $this->total_per_day <= 180){
                if($this->salary_per_day > $this->salario_minimo_diario){
                    $this->paid_company = 2 * $this->salary_per_day; //porcentaje en requerimiento
                    $this->paid_eps = ($this->total_per_day -2) * $this->salary_per_day * 0.67; 
                }else{
                    $this->paid_company = 2 * $this->salary_per_day; //porcentaje en requerimiento
                    $this->paid_eps = ($this->total_per_day -2) * $this->salary_per_day; 

                }
            }
        }

        $this->paid_total = $this->paid_company + $this->paid_eps + $this->paid_arl + $this->paid_afp;

    }

    public function store()
    {

        $this->validate($this->rules);
        //dd($this->paid_company);
        Incapacity::create([

            'incapacity_type_id' => $this->incapacity_type_id,
            'employee_id' => $this->employee_id,
            'cie_10_id' => $this->cie_10_id,
            'start_date' => $this->start_date,
            'end_date' => $this->end_date,
            'clasification' => $this->clasification,
            'paid_company' => $this->paid_company,
            'paid_eps' => $this->paid_eps,
            'paid_arl' => $this->paid_arl,
            'paid_afp' => $this->paid_afp,



        ]);

        Alert::toast('Registro de incapacidad guardado correctamente','success');
        return redirect()->route('administrador.incapacities.index');
    }
    
    public function render()
    {
        return view('livewire.administrador.incapacity-create');
    }
}
