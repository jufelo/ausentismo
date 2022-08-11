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
            'clasification' => 'required'

          ]);
    }

    public function calcular_dias()
    {
        if(strtotime($this->end_date) >= strtotime($this->start_date) && strtotime($this->start_date) != null && strtotime($this->end_date) != null && strtotime($this->start_date) >= 946684800){
            $this->total_per_day = ((strtotime($this->end_date) - strtotime($this->start_date)) / 86400);

        }else{
            $this->total_per_day = '';
        }
    }

    public function calcular_salario($value)
    {
        $employees = Employee::find($value);
        if($employees){
            $this->salary_per_day = $employees->salary / 30;
        }else{
            $this->salary_per_day = 0.00;
        }
        
    }

    public function store()
    {

        $this->validate($this->rules);

        Incapacity::create([

            'incapacity_type_id' => $this->incapacity_type_id,
            'employee_id' => $this->employee_id,
            'cie_10_id' => $this->cie_10_id,
            'start_date' => $this->start_date,
            'end_date' => $this->end_date,
            'clasification' => $this->clasification,


        ]);

        Alert::toast('Registro de incapacidad guardado correctamente','success');
        return redirect()->route('administrador.incapacities.index');
    }
    public function render()
    {
        return view('livewire.administrador.incapacity-create');
    }
}
