<?php

namespace App\Http\Controllers\Administrador;

use App\Http\Controllers\Controller;
use App\Http\Requests\IncapacityStoreRequest;
use App\Models\Cie_10;
use App\Models\Employee;
use App\Models\Incapacity;
use App\Models\Incapacity_type;
use Exception;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class IncapacityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employees = Employee::all();
        $incapacities = Incapacity::all();
        $incapacity_types = Incapacity_type::all();
        $cie_10s = Cie_10::all();
        //$employees = Employee::with('incapacity')->get();
        //dd($incapacities);
        
        return view('administrador.incapacities.index', compact('employees', 'incapacities','incapacity_types', 'cie_10s'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $employees = Employee::all();
        $incapacities = Incapacity::all();
        $listaIncapacidades = Incapacity_type::pluck('name','id');
        $cie_10s = Cie_10::all();
        //dd($cie_10s);
        return view('administrador.incapacities.create', compact('employees', 'listaIncapacidades', 'cie_10s'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(IncapacityStoreRequest $request)
    {
        try
        {

            Employee::find($request->employee);
            //dd($request->employee);
            Incapacity::create([
                'incapacity_type_id' => $request->incapacity_type_id,
                'employee_id' => $request->employee,
                'cie_10_id' => $request->cie_10,
                'start_date' => $request->start_date,
                'end_date' => $request->end_date,
                'clasification' => $request->clasification,
                
            ]);
            
            Alert::toast('registro incapacidad guardado exitosamente', 'success');
            return redirect()->route('administrador.incapacities.index');


        }
        catch(Exception $e)
        {
            //dd($request);
            return "Ha ocurrido un error";
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Incapacity $incapacity)
    {
        $employees = Employee::all();
        $employee = Employee::find($incapacity->employee_id);
        $listaIncapacidades = Incapacity_type::pluck('name','id');
        $cie_10s = Cie_10::all();
        $cie_10 = Cie_10::find($incapacity->cie_10_id);

        //dd($cie_10);
        return view('administrador.incapacities.edit', compact('incapacity', 'employees', 'employee', 'listaIncapacidades', 'cie_10s', 'cie_10'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(IncapacityStoreRequest $request, Incapacity $incapacity)
    {
        {
            try
            {
                $incapacity->update($request->all());
                //dd($employee);
                Alert::toast('Registro actualizado exitosamente','success');
                return redirect()->route('administrador.incapacities.index');
    
            }catch(Exception $e)
            {
                Alert::toast('Error en la actualización','error');
                return redirect()->route('administrador.incapacities.index');
            }
        }
    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Incapacity $incapacity)
    {
        try
        {
            $incapacity->delete();
            Alert::toast('Registro de incapacidad eliminado exitosamente','success');
            return redirect()->route('administrador.incapacities.index');
        }    
        catch(Exception $e)
        {
            Alert::toast('Error en la eliminación del registro de incapacidad','error');
            return redirect()->route('administrador.incapacities.index');
        }    
    }
}
