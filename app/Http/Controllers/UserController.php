<?php

namespace App\Http\Controllers;

use Auth;
use DB;
use Hash;
use App\User;
use App\Role;
use App\Company;
use Illuminate\Http\Request;

class UserController extends Controller
{    
    
    public function list(){
        //1 Compañias a la que pertenece el usuario
        $companies_id = Auth::user()->companies()->pluck('company_id')->toArray();
        //Consultar a la tabla company_user las id de los usuarios que pertenecen a las compañias dichas
        $users_id= DB::table('company_user')->whereIn('company_id',$companies_id)->pluck('user_id')->toArray();
        //buscar los usuarios con las id obtenidas
        $users = User::WhereIn('id',$users_id)->get();
        return view('users.list',compact('users'));
    }

    public function add(){
        $role_ids=[1,2];
        if(Auth::user()->hasRole('superadmin')){
            $role_ids=[1,2,3];
        }
        $companies = Auth::user()->companies;
        $roles = Role::whereIn("id",$role_ids)->get();
        $user = new User;
        return view('users.form',compact('roles','companies','user'));
    }

    public function details($user_id){
        $role_ids=[1,2];
        if(Auth::user()->hasRole('superadmin')){
            $role_ids=[1,2,3];
        }
        $companies = Auth::user()->companies;
        $roles = Role::whereIn("id",$role_ids)->get();
        $user = User::findOrFail($user_id);
        return view('users.form',compact('roles','companies','user'));
    }
    
    public function delete($user_id)
    {
        try {
            $user = User::findOrFail($user_id);
            $user->email=null;
            $user->enabled=0;
            $user->save();
            return redirect()->route('users.list')->with('success', 'Usuario eliminado correctamente');
        } catch (\Throwable $th) {
            return redirect()->route('users.list')->with('error', 'Problema al eliminar usuario');
        }
    }

    public function process(Request $request){
        $id = $request->id;
        if($id){
            //Si encuentra el ID edita
            $user = User::findOrFail($id);
            $user->name =  $request->name;
            $user->email =  $request->email;
            if($request->newpassword){
                $user->password = bcrypt($request->password);
            }
            $user->save();

            //BORRA COMPAÑIAS ANTIGUAS
            DB::table('company_user')->where('user_id', $id)->delete();
            //BORRA ROLES ANTIGUOS
            DB::table('role_user')->where('user_id', $id)->delete();

            //RENUEVA COMPAÑIAS
            $company_ids = $request->company_id;
            foreach ($company_ids as $key => $company_id) {
                $company = Company::findOrFail($company_id);
                $user->companies()->attach($company);
            }

            //RENUEVA ROLES
            $role_ids = $request->role_id;
            foreach ($role_ids as $key => $role_id) {
                $role = Role::findOrFail($role_id);
                $user->roles()->attach($role);
            }

            return redirect()->route('users.list')->with('success', 'Usuario editado correctamente');
        }else{
            //Si no, Crea un Item        
            $user = new User;
            $user->name =  $request->name;
            $user->email =  $request->email;
            $user->password = bcrypt($request->password);

            $user->save();

            //ADJUNTA ROLES
            $role_ids = $request->role_id;
            foreach ($role_ids as $key => $role_id) {
                $role = Role::findOrFail($role_id);
                $user->roles()->attach($role);
            }

            //ADJUNTA COMPAÑIAS
            $company_ids = $request->company_id;
            foreach ($company_ids as $key => $company_id) {
                $company = Company::findOrFail($company_id);
                $user->companies()->attach($company);
            }

            return redirect()->route('users.list')->with('success', 'Usuario creado correctamente');
        }
    }

    public function passwordchange(){
        //busca el usuario en la bd
        $user = Auth::user();
        return view('users.passwordchange' , compact('user'));
    }

    public function passwordchangeProcess(Request $request){

        $user = Auth::user();
        $oldpassword = $request->oldpassword;

        if(Hash::check($oldpassword,$user->password)){
            $input = $request->all();
            $input['password'] = Hash::make($request->password);
            $user->update($input);

            $userAutentificated = Auth::loginUsingId($user->id);
            return back()->with('success', 'Contraseña cambiada correctamente');
        }else{
            return back()->with('error','La clave antigua no corresponde')->withInput();
        }
    }
}
