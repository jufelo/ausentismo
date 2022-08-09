<?php

namespace App\Http\Livewire\Administrador;

use App\Models\Cie_10;
use App\Models\Employee;
use App\Models\Incapacity;
use Livewire\Component;
use RealRashid\SweetAlert\Facades\Alert;

class IncapacityCreate extends Component
{
    
    public $name;
    public $lastname;
    public $incapacity_type;
    public $start_date;
    public $end_date;
    public $clasification;
    public $total_per_day;
    public $salary_per_day;
    public $salary;
    public $employees;
    public $listaIncapacidades;
    public $employee_id;
    public $incapacity_type_id;
    public $cie_10s = [];

    protected $rules = 
    [   
        'start_date' => 'required',
        'end_date' => 'required',
        //'incapacity_type' => 'required',
        //'clasification' => 'required',
        //'employee_id' => 'required',
        
    ];

    protected $messages = [
        'name.required' => 'El nombre es requerido.',
        'lastname.required' => 'El apellido es requerido.',
        'clasification.required' => 'La clasificación es requerida.',
        'salary.required' => 'El salario es requerido.',

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
        $this->total_per_day = ((strtotime($this->end_date) - strtotime($this->start_date)) / 60 / 60 / 24);
    }

    public function calcular_salario()
    {
        $this->salary_per_day = $this->employee->salary / 30;
    }

    public function store()
    {

        $this->validate($this->rules);

        Incapacity::create([
            
            'employee_id' => $this->employee_id,
            'incapacity_type_id' => $this->incapacity_type_id,
            'start_date' => $this->start_date,
            'end_date' => $this->end_date,
            'clasification' => $this->clasification,

        ]);

        Alert::toast('Empleado guardado correctamente','success');
        return redirect()->route('administrador.incapacity.index');
    }
    public function render()
    {
        return view('livewire.administrador.incapacity-create');
    }
}
