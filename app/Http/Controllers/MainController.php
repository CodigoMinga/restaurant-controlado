<?php

namespace App\Http\Controllers;
use Hash;
use App\User;
use Illuminate\Http\Request;
use Auth;


class MainController extends Controller
{
    public function login(){
        if(Auth::user()){
            return redirect(url('/tables'));
        }else{
            return view('login.login');
        }
    }

    public function checkLogin(Request $request){

        $this->validate($request,[
            'email' => 'required|email',
            'password' => 'required|min:3'
        ]);

        $user_data = array (
            'email' => $request->get('email'),
            'password' => $request->get('password'),
        );

        if(Auth::attempt(['email' => $user_data['email'], 'password' => $user_data['password'], 'enabled' => 1])){
            $message="[Login] Successfully El usuario ". Auth::user()->email." a iniciado sesión correctamente";
            return redirect('/tables');
        }

        else{
            return back()->with('error','Error en las credenciales');
        }

    }

    function logout()
    {
        Auth::logout();
        return redirect(url('/'));
    }

    function passwordLost(){
        return view('passwordlost');
    }

    public function passwordRessetToken($user_id,$token){

        $token_db = Db::table('password_resets')->where('token','=',$token)->first();
        $user = User::findOrFail($user_id);

        if(isset($token_db)){
            return view('passwordresetform',compact('user','token'));
        }else{
            return view('passwordresetform')->withErrors('El token expiro.');
        }

    }

    public function passwordRessetTokenProcess($user_id,$token,Request $request){

        $user = User::findOrFail($user_id);
        $user->password = Hash::make($request->password);

        if($user->save()){
            $userAutentificated = Auth::loginUsingId($user->id);
            $sucess  = true;
            $returnUrl = url('/')."/app/home";
            $message =  "Contraseña actualizada, Bienvenido a nuestro sistema";
            return view('template.genericphoneprocess',compact('message','sucess','returnUrl'));
        }else{
            return redirect()->back()->withErrors(['error' => 'No se pudo cambiar la contraseña']);
        }

    }
}
