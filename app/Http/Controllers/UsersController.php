<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use jeremykenedy\LaravelRoles\Models\Role;
use App\Http\Requests\UsuarioRequest;
use App\Http\Requests\UsuarioUpdateRequest;
class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::orderBy('id', 'asc')->get();
        return view('admin.user.index', ['users' => $users]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        if($request->ajax()){
            $roles = Role::where('id', $request->role_id)->first();

            $permissions = $roles->permissions;
            return $permissions;
        }

        $roles = Role::all();

        return view('admin.user.create',['roles' => $roles]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UsuarioRequest $request)
    {
        

        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->nombres = $request->nombres;
        $user->apellidos = $request->apellidos;
        $user->cargo = $request->cargo;
        $user->password = Hash::make($request->password);
        $user-> save();

        if($request->role != null){
            $user->roles()->attach($request->role);
            $user->save();
        }

        return redirect('/user');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return view('admin.user.show', ['user' => $user]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $roles = Role::get();
        $userRole = $user->roles->first();
        $userPermissions = $user->getPermissions();

        return view('admin.user.edit', [
            'user' => $user,
            'roles' => $roles,
            'userRole' => $userRole,
            'userPermissions' => $userPermissions
            ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(UsuarioUpdateRequest $request, User $user)
    {

         //validate the fields

        $user->name = $request->name;
        $user->email = $request->email;
        $user->nombres = $request->nombres;
        $user->apellidos = $request->apellidos;
        $user->cargo = $request->cargo;

        if($request->password != null){
            $user->password = Hash::make($request->password);
        }
        $user->save();

        $user->roles()->detach();

        if($request->role != null){
            $user->roles()->attach($request->role);
            $user->save();
        }

        return redirect('/user');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {

        $user->roles()->detach();
        $user->delete();

        return redirect('/user');
    }
    public function activar(Request $request, User $user)
    {
        $user->activo = $request->activo;
        $user->save();
        return redirect('/user');
    }
}
