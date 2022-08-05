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
    public $incapacity_type;
    public $start_date;
    public $end_date;
    public $clasification;
    public $total_per_day;
    public $salary_per_day;
    public $salary;
    public $employees;
    public $listaIncapacidades;

    protected $rules = 
    [   
        'start_date' => 'required',
        'end_date' => 'required',
        'incapacity_type' => 'required',
        'clasification' => 'required',
        'salary' => 'required'
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
        $this->total_per_day = $this->end_date-$this->start_date;
    }

    public function calcular_salario()
    {
        $this->salary_per_day = $this->salary / 30;
    }

    public function store()
    {

        $this->validate($this->rules);

        Incapacity::create([
            
            'start_date' => $this->start_date,
            'end_date' => $this->end_date,
            'clasification' => $this->clasification,
            'salary' => $this->salary,
            'incapacity_type_id' => $this->incapacity_type_id,
            'employee_id' => $this->employee_id

        ]);

        Alert::toast('Empleado guardado correctamente','success');
        return redirect()->route('administrador.incapacity.index');
    }
    public function render()
    {
        return view('livewire.administrador.incapacity-create');
    }
}
