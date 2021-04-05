<?php

namespace App\Http\Controllers;

use App\Role;
use App\User;
use App\Company;
use Auth;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function add(){

        $roles = Role::all();
        $companies = Company::all();
        return view('users.add',compact('roles', 'companies'));
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
    $companies=Company::all();
    $roles = Role::all();
    return view('users.details', \compact('roles', 'companies') ,[
        'user' => User::find($user_id)
    ]);
}
public function addProcess(Request $request){
    User::create($request->all());
    return redirect()->route('users.list')->with('success', 'Usuario Creado correctamente');
}

}
