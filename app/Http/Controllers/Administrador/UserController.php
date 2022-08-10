<?php

namespace App\Http\Controllers\Administrador;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserStoreRequest;
use App\Http\Requests\UserUpdateRequest;
use App\Models\Employee;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return
     */
    public function index()
    {
        $users = User::where('status', '1')->get();
        return view('administrador.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return
     */
    public function create()
    {
        //$employees =  Employee::pluck('full_name','id');
        $employees = Employee::all();
        $listaRoles = Role::pluck('name', 'id');
        return view('administrador.users.create',compact('listaRoles','employees'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return
     */
    public function store(UserStoreRequest $request)
    {
        try
        {
            $result = Employee::find($request->employee);
            $user = User::create([
                'name' => $result->name.' '.$result->lastname,
                'email' => $request->email,
                'status' => '1',
                'password' => bcrypt($request->password),
                'employee_id' => $request->employee
            ]);
            $user->roles()->sync($request->roles);
            Alert::toast('usuario guardado exitosamente', 'success');
            return redirect()->route('administrador.users.index');

        }
        catch(Exception $e)
        {
            return "ha ocurrido un error";
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return
     */
    public function show($id)
    {
        //
    }

    public function edit(User $user)
    {
        //$employees = Employee::pluck('full_name','id');
        $userRoles = $user->getRoleNames()->all();
        $employees = Employee::all();
        $listaRoles = Role::all();
        return view('administrador.users.edit',compact('user','listaRoles','employees', 'userRoles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return
     */
    public function update(UserUpdateRequest $request, User $user)
    {
        try
        {
            if($request->password == null)
            {
                $password = $user->password;
            }
            else
            {
                $password = bcrypt($request->password);
            }
            $user->update([
                'name' => $user->name,
                'email' => $request->email,
                'status' => $user->status,
                'password'=> $password,
                'employee_id' => $user->employee_id,
            ]);
            $user->roles()->sync($request->listaRoles);
            //dd($user);
            Alert::toast('usuario actualizado exitosamente', 'success');
            return redirect()->route('administrador.users.index');


        }catch(Exception $e)
        {
            Alert::toast('Error en la actualización','error');
            return redirect()->route('administrador.users.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return
     */
    public function destroy(User $user)
    {
        try
        {
            $user->update([
                'status' => "0"
            ]);
            Alert::toast('Usuario eliminado exitosamente','success');
            return redirect()->route('administrador.users.index');
        }
        catch(Exception $e)
        {
            Alert::toast('Error en la eliminación de usuario','error');
            return redirect()->route('administrador.users.index');
        }

    }
}
