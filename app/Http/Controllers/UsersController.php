<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\User;
use \App\Pagos;
use \App\Mensajes;
use \App\Carros;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use \Stripe;
use Illuminate\Support\Facades\DB;

class UsersController extends Controller
{
    //

    private $k="sk_test_cwGiWUDvgJ2zVKRD9SBsNIRB";

    function nuevo(request $request){

        $u=new User();
        $u->nombre=$request->get('txtNombre');
        $u->apellido=$request->get('txtApellido');
        $u->numtel=$request->get('txtCelular');
        $u->email=$request->get('txtCorreo');
        $u->username=$request->get('txtUsername');
        $u->password=Hash::make($request->get('txtPass'));
        $u->foto="";
        $u->fb="";
        $u->twitter="";
        $u->tipo=0;
        if(($request->exists('chkDealer')==1)){
            $u->tipo=1;
        }
        $u->ciudad="";
        $u->contacto=1;
        $u->status=0;
        $u->autopago=0;
        $u->save();

        Auth::login($u);

        if(($request->exists('chkDealer')==1)){
            return redirect('/pagoDealer');
        }
        else{
            return redirect('/');
        }
    }

    function actualizar(request $request){
        $u=Auth::user();

        if($request->exists('fotoPerfil')){
            $nombre=$u->id.'.'.$request->file('fotoPerfil')->extension();

            $file=$request->fotoPerfil;
            \Storage::disk('local')->put('/images/usuarios/'.$nombre,  \File::get($file));
            $u->foto=$nombre;
        }

        $u->nombre=$request->get('txtNombre');
        $u->apellido=$request->get('txtApellido');
        $u->numtel=$request->get('txtCelular');
        $u->email=$request->get('txtEmail');
        $u->username=$request->get('txtUsername');
        if(($request->get('txtPass')!="")){
            $u->password=Hash::make($request->get('txtPass'));
        }
        $u->fb=$request->get('txtFb');
        $u->twitter=$request->get('txtTwitter');

        $u->ciudad=$request->get('txtCiudad');

        $u->contacto=0;
        if(($request->exists('chkFormulario')==1)){
            $u->contacto=1;
        }
        $u->autopago=0;
        if(($request->exists('chkAutoPago')==1)){
            $u->autopago=1;
        }
        $u->save();

        return redirect('/usuario/perfil');

    }

    function pagoUsuario($carro){
        if(Auth::check()){
            $u=Auth::user();
            $c=DB::table('carros')->join('modelos','modelos.id','=','carros.idModelo')
                ->join('tipos','carros.idTipo','=','tipos.id')
                ->join('marcas','modelos.idMarca','=','marcas.id')
                ->select('carros.*','tipos.nombre AS tipo','marcas.nombre AS marca','modelos.nombre AS modelo')->where('carros.id',$carro)
                ->get();
            $ca=Carros::find($carro);
            if($u->autopago){

                if(!$u->idStripe==""){
                    \Stripe\Stripe::setApiKey($this->k);
                    $charge = \Stripe\Charge::create(array(
                        'customer' => $u->idStripe,
                        'amount'   => 499,
                        'currency' => 'usd'
                    ));
                    $ca->estado=1;
                    $ca->save();

                    $pago=new Pagos();

                    $pago->fecha=date("Y") . "/" . date("m") . "/" . date("d");

                    $u=Auth::user();

                    if($u->tipo==1){
                        $pago->monto=30;
                        $u->status=1;
                        $u->fechacorte=date("d");
                    }
                    else{
                        $pago->monto=4.99;
                    }

                    $pago->idUser=$u->id;

                    $pago->save();
                    $u->save();


                    return redirect('/carro/view/'.$ca->id);

                }
            }

            $error="";
            if($ca->estado==1 || $ca->estado==2){
                $error="No se puede pagar el carro seleccionado";
            }

            return view('users.pago',[
                'c'=>$c,
                'user'=>Auth::user(),
                'error'=>$error,
                'num'=>'4',
                'monto'=>'4.99',
                'montoDos'=>'499'
            ]);


        }
        else{
            return redirect('/');
        }
    }

    function pagoDealer(){
        if(Auth::check()){

        }
        else{
            return redirect('/');
        }
    }

    function cobrar(request $request){

        \Stripe\Stripe::setApiKey($this->k);

        $u=Auth::user();
        if($u->idStripe!=""){
            $cliente=\Stripe\Customer::create(array(
                "description" => Auth::user()->email,
                "source" => $request->get('stripeToken') // obtained with Stripe.js
            ));


            $u->idStripe=$cliente->id;

        }


        $pago=new Pagos();

        $pago->fecha=date("Y") . "/" . date("m") . "/" . date("d");

        $u=Auth::user();

        if($u->tipo==1){
            $pago->monto=30;
            $u->status=1;
            $u->fechacorte=date("d");
        }
        else{
            $pago->monto=4.99;
        }

        $pago->idUser=$u->id;

        $pago->save();
        $u->save();

        if($request->exists('idCarro')){
            $carro=Carros::find($request->get('idCarro'));
            $carro->estado=1;
            $carro->save();

            return redirect('/carro/view/'.$carro->id);
        }


        return redirect('/usuario/perfil');

    }

    function logout(){
        Auth::logout();
        return Redirect('/');
    }

    function login(request $request){

        $chkRemember=$request->get('chkRemember') ? 1 : 0;

        if(Auth::attempt(['username'=>$request->get('txtCorreo'), 'password'=>$request->get('txtPass')],$chkRemember) || Auth::attempt(['email'=>$request->get('txtCorreo'), 'password'=>$request->get('txtPass')],$chkRemember)){
            return redirect('/usuario/perfil');
        }else{
            return view('login',['error'=>'a']);
        }
    }

    function perfil(){
        if(!Auth::check()){
            return redirect('/login');
        }

        return view('users.perfil',[
           'user'=>Auth::user(),
            'num'=>1
        ]);

    }

    function configuracion(){
        if(!Auth::check()){
            return redirect('/login');
        }

        return view('users.configuracion',[
            'user'=>Auth::user(),
            'num'=>5
        ]);
    }

    function pagos(){
        if(Auth::check()){
            $u=Auth::user();
            $pagos=pagos::where('idUser',$u->id)->get();

            return view('users.pagos',[
                'user'=>Auth::user(),
                'num'=>4,
                'pagos'=>$pagos

            ]);
        }
        else{
            return redirect('/');
        }
    }

    function mensajes(){
        if(Auth::check()){
            $u=Auth::user();
            $mensajes=DB::table('mensajes')
                ->leftjoin('users','mensajes.idUserSend','=','users.id')->orderby('mensajes.fecha','DESC')->orderby('mensajes.hora','DESC')
                ->select(DB::RAW('DISTINCT(mensajes.idUserSend),mensajes.id,mensajes.mensaje,mensajes.fecha,mensajes.hora,mensajes.estado,users.nombre, users.apellido'))
                ->where('mensajes.idUserReceive',$u->id)
                ->orwhere('mensajes.idUserSend',$u->id);

            echo  $mensajes->toSql();
            return view('users.mensajes',[
                'user'=>Auth::user(),
                'num'=>3,
                'mensajes'=>$mensajes->paginate(10)

            ]);
        }
        else{
            return redirect('/');
        }
    }

    function leerMensaje($id){
        if(Auth::check()){

            $mensajes=DB::table('mensajes')
                ->leftjoin('users','mensajes.idUserSend','=','users.id')
                ->select('mensajes.id','mensajes.idUserSend','mensajes.mensaje','mensajes.fecha','mensajes.hora','mensajes.estado','users.nombre', 'users.apellido')
                ->where(function($query) use ($id){
                    $query->where('mensajes.idUserSend',$id);
                    $query->where('mensajes.idUserReceive',Auth::user()->id);
                })->orwhere(function($query) use ($id){
                    $query->where('mensajes.idUserReceive',$id);
                    $query->where('mensajes.idUserSend',Auth::user()->id);
                })->get();
                $remitente=User::find($id);

            DB::table('mensajes')->where(function($query) use ($id){
                $query->where('mensajes.idUserSend',$id);
                $query->where('mensajes.idUserReceive',Auth::user()->id);
            })->update(['estado'=>1]);

            return view('users.mensaje',[
                'user'=>Auth::user(),
                'num'=>3,
                'mensajes'=>$mensajes,
                'remitente'=>$remitente
            ]);
        }
        return redirect('/');
    }
}
