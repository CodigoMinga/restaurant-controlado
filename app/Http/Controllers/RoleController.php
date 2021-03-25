<?php

namespace App\Http\Controllers;

use App\Role;
use App\User;
use Auth;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function show(Role $role)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function edit(Role $role)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Role $role)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function destroy(Role $role)
    {
        //
    }
    public function add(){

        $roles = Role::all();

        return view('users.add',compact('roles'));
    }
    public function list(){

        $users = User::all();
        return view('users.list',compact('users'));
    }
    public function editprocess($user_id, Request $request)
{
    //busca la orden en la base de datos con el id que se le pasa desde la URL
    $user = User::findOrFail($user_id);

    $user->update($request->all());

    return redirect()->route('users.list')->with('success', 'Usuario editado correctamente');
}
public function details($user_id)
{
    return view('users.details', [
        'user' => User::find($user_id)
    ]);
}
public function addProcess(Request $request){
    User::create($request->all());
    return redirect()->route('users.list')->with('success', 'Usuario Creado correctamente');
}

}
