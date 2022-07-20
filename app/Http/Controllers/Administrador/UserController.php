<?php

namespace App\Http\Controllers\Administrador;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserStoreRequest;
use App\Http\Requests\UserUpdateRequest;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$users = User::all();
        $users = User::where('status', '1')->get();
        //dd($users);
        return view('administrador.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('administrador.users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserStoreRequest $request)
    {
        //dd($request);
        // $name = strtoupper($request->name);
        //dd($name);
        try
        {
            User::create([
                'name' => $request->name,
                'email' => $request->email,
                'status' => '1',
                'password' => bcrypt($request->password),
            ]);
            //Alert::success('Exitoso', 'Usuario guardado correctamente');
            Alert::toast('Usuario guardado exitosamente','success');
            return redirect()->route('administrador.users.index');

        }
        catch(Exception $e)
        {
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
    public function edit(User $user)
    {
        $roles = Role::all();
        //dd($roles);
        return view('administrador.users.edit', compact('user','roles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserUpdateRequest $request, User $user)
    {
        try
        {
            $user->roles()->sync($request->roles);

            Alert::toast('Usuario actualizado exitosamente','success');
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
     * @return \Illuminate\Http\Response
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
