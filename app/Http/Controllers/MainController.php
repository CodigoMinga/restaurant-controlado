<?php

namespace App\Http\Controllers;
use Hash;
use App\User;
use App\Mail\PasswordResetMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;
use DB;
use Str;
use Carbon\Carbon;
use Auth;
use App\Log;
use Session;


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

    function passwordLostProcess(Request $request){

        //dd($request->email);
        $user = User::where ('email', $request->email)->first();
        if ( !$user ) return redirect()->back()->withErrors(['error' => 'Ingrese un correo valido']);

        //create a new token to be sent to the user.
        DB::table('password_resets')->insert([
            'email' => $request->email,
            'token' => Str::random(60), //change 60 to any length you want
            'created_at' => Carbon::now()
        ]);

        $tokenData = DB::table('password_resets')
            ->where('email', $request->email)->first();
        $token = $tokenData->token;
        $email = $request->email; // or $email = $tokenData->email;

        $subject = "Solicitud de reinicio de contraseña";
        $receivers = [$email];
        $status = Mail::to($receivers)->send(new PasswordResetMail($user,$token,$subject));

        $message = "Se ha enviado un correo para reestablecer contraseña";
        return view('generic',compact('message'));
    }


}
