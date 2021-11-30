<?php

namespace App\Http\Controllers;
use Hash;
use DB;
use Auth;
use Session;
use App\User;
use App\Company;
use App\Order;
use App\Item;
use App\Orderdetail;
use App\Mail\PasswordResetMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;


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
            if(COUNT(Auth::user()->companies)>1){
                $companys = Auth::user()->companies;
                return view('companyselection',compact('companys'));;
            }else{
                $company = Auth::user()->companies[0];
                session(['company' => $company]);
                return redirect('/tables');
            }
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
        return view('login.passwordlost');
    }

    public function passwordResetToken($user_id,$token){

        $token_db = Db::table('password_resets')->where('token','=',$token)->first();
        $user = User::findOrFail($user_id);

        if(isset($token_db)){
            return view('passwordresetform',compact('user','token'));
        }else{
            return view('passwordresetform')->withErrors('El token expiro.');
        }

    }

    public function passwordResetTokenProcess($user_id,$token,Request $request){

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

    function resetpasswordProcess(Request $request){

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


    
    function dashboard(){
        $company = session('company');

        $desde = date('Y-m-d', strtotime('monday this week'));
        //$desde = date('Y-m-d', strtotime('1990-01-01'));
        $hasta = date('Y-m-d', strtotime('monday next week'));
        
        //ventas de la semana
        $query = "SELECT COUNT(internal_id) AS sales, DAYOFWEEK(created_at) AS dayweek FROM orders WHERE enabled = 1 AND company_id = $company->id AND created_at > '$desde' AND created_at < '$hasta' GROUP BY DATE(created_at)";       
        $salesweek = DB::select($query);

        //bajo stock
        $lowstock = Item::where('enabled',1)->where('company_id',$company->id)->orderByRaw('(stock - warning) ASC')->limit(10)->get();

        //Mas Vendidos
        $query = 
        "SELECT SUM(od.quantity) AS cant,p.name  FROM 
        orderdetails AS od LEFT JOIN 
        products p ON od.product_id = p.id LEFT JOIN 
        orders o ON od.order_id = o.id 
        WHERE 
        od.enabled = 1 AND 
        o.enabled = 1 AND 
        o.company_id = $company->id AND 
        od.created_at >= '$desde' AND od.created_at < '$hasta'
        GROUP BY od.product_id ORDER BY cant DESC LIMIT 7";
        $salesbest = DB::select($query);

        //Ganacia
        $order_totals = 0;
        $orders = Order::where('enabled',1)->where('company_id',$company->id)->where('created_at',">=",$desde)->where('created_at',"<",$hasta)->get();
        foreach ($orders as $key => $order) {
            $order_totals=$order_totals+$order->Total;
        }

        $query = 
        "SELECT 
        SUM(credit_card) AS credit_card, 
        SUM(debit_card) AS debit_card, 
        SUM(efective) + SUM(difference) AS efective, 
        SUM(transfer) AS transfer, 
        SUM(discount) AS discount, 
        SUM(tip) AS tip, 
        SUM(delivery) AS delivery, 
        SUM(ordertype_id=1) AS ordertype_1,
        SUM(ordertype_id=2) AS ordertype_2,
        SUM(ordertype_id=3) AS ordertype_3
        FROM orders
        WHERE 
        company_id = $company->id AND
        enabled = 1
        AND created_at >= '$desde' AND created_at < '$hasta'
        ";
        $profit = DB::select($query);

        $query = 
        "SELECT 
        tt.name, COUNT(r.id) as cant FROM tabletypes tt 
        LEFT JOIN 
        (
            SELECT o.id,t.tabletype_id FROM orders AS o 
            LEFT JOIN tables AS t 
            ON o.table_id = t.id 
            WHERE o.enabled=1
            AND o.created_at >= '$desde' AND o.created_at < '$hasta'
        ) AS r 
        ON r.tabletype_id=tt.id
        GROUP BY tt.id";
        $tabletypes = DB::select($query);

        return view('main.dashboard',compact('salesweek','lowstock','salesbest','profit','order_totals','tabletypes'));
    }

    
    function settings(){
        return view('main.settings');
    }

    function setcompany(Request $request){
        $company = Company::findOrFail($request->company_id);
        session(['company' => $company]);
        return redirect('/tables');
    }
}
