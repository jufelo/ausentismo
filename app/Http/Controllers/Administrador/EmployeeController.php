<?php

namespace App\Http\Controllers\Administrador;

use App\Http\Controllers\Controller;
use App\Http\Requests\EmployeeStoreRequest;
use App\Http\Requests\EmployeeUpdateRequest;
use Illuminate\Http\Request;
use App\Models\Employee;
use Exception;
use RealRashid\SweetAlert\Facades\Alert;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employees = Employee::all();
        return view('administrador.employees.index', compact('employees'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('administrador.employees.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EmployeeStoreRequest $request)
    {
        //dd($request);
        try
        {
            //dd($request);
            Employee::create($request->all());
            //dd($request);
            //Alert::success('Exitoso', 'Usuario guardado correctamente');
            Alert::toast('Empleado guardado exitosamente','success');
            return redirect()->route('administrador.employees.index');

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
    public function edit(Employee $employee)
    {
        return view('administrador.employees.edit', compact('employee'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EmployeeUpdateRequest $request, Employee $incapacity)
    {
        try
        {
            $$incapacity->update($request->all());
            //dd($employee);
            Alert::toast('Usuario actualizado exitosamente','success');
            return redirect()->route('administrador.incapacities.index');

        }catch(Exception $e)
        {
            Alert::toast('Error en la actualización','error');
            return redirect()->route('administrador.incapacities.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Employee $employee)
    {
        try
        {
            $employee->delete();
            Alert::toast('Usuario eliminado exitosamente','success');
            return redirect()->route('administrador.employees.index');
        }    
        catch(Exception $e)
        {
            Alert::toast('Error en la eliminación de usuario','error');
            return redirect()->route('administrador.employees.index');
        }    
    }
}
