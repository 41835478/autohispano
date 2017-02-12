<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use \App\Carros;
use \App\Marcas;
use \App\Modelos;
use \App\Tipos;
use \App\Mensajes;
use Illuminate\Support\Facades\DB;

class SistemController extends Controller
{
    //

    function home(){
        $carros=DB::table('carros')->join('users','carros.idUser','=','users.id')
            ->join('tipos','carros.idTipo','=','tipos.id')
            ->join('modelos','carros.idModelo','=','modelos.id')
            ->join('marcas','modelos.idMarca','=','marcas.id')
            ->select('carros.precio', 'carros.id','marcas.nombre as marca','modelos.nombre as modelo','tipos.nombre as tipo')
            ->where(function($query){
                $query->where('carros.estado','1');
            })->where(function($query){
                $query->where('users.tipo','0');
            })->orwhere(function($query){
                $query->where('users.tipo','1')
                    ->where('users.status','1');
            })->get();

        $datos=[];
        $datos['carros']=$carros;
        if(Auth::check()){
            $u=Auth::user();
            $datos['user']=$u;
        }

        return view('home',$datos);

    }

    function inventario(){
        $carros=DB::table('carros')->join('users','carros.idUser','=','users.id')
            ->join('tipos','carros.idTipo','=','tipos.id')
            ->join('modelos','carros.idModelo','=','modelos.id')
            ->join('marcas','modelos.idMarca','=','marcas.id')
            ->select('carros.precio', 'carros.id','carros.anio','carros.millaje','carros.comentarios', 'carros.transmision','carros.tipoCombustible','marcas.nombre as marca','modelos.nombre as modelo','tipos.nombre as tipo', 'users.id as idUser', 'users.nombre as user', 'users.apellido')
            ->where(function($query){
                $query->where('carros.estado','1');
            })->where(function($query){
                $query->where('users.tipo','0');
            })->orwhere(function($query){
                $query->where('users.tipo','1')
                    ->where('users.status','1');
            })->get();

        $modelos=Modelos::all();
        $marcas=Marcas::all();
        $tipos=Tipos::all();

        $datos=[];
        $datos['carros']=$carros;
        $datos['modelos']=$modelos;
        $datos['marcas']=$marcas;
        $datos['tipos']=$tipos;
        if(Auth::check()){
            $u=Auth::user();
            $datos['user']=$u;
        }

        return view('inventario',$datos);
    }

    function login(){
        if(Auth::check()){
            return redirect('/');
        }

        return view('login');

    }

    function agregarCarro(){
        if(!Auth::check()){
            return redirect('/login');
        }

        $marcas=Marcas::all();
        $modelos=Modelos::all();
        $tipos=Tipos::all();

        return view('carro.nuevo',[
            'user'=>Auth::user(),
            'num'=>7,
            'tipos'=>$tipos,
            'marcas'=>$marcas,
            'modelos'=>$modelos
        ]);
    }

    function postAgregarCarro(request $request){
        if(Auth::check()){
            $maximoFotos=$request->get('contadorImagenes');

            if(Auth::user()->tipo==0){
                if($maximoFotos>5){
                    $maximoFotos=5;
                }
            }

            $carro=new Carros();
            $carro->condicion=$request->get('cboCondicion');
            $carro->idModelo=$request->get('cboModelo');
            $carro->anio=$request->get('txtAnio');
            $carro->idTipo=$request->get('cboTipo');
            $carro->millaje=$request->get('txtMillaje');
            $carro->tipoCombustible=$request->get('cboTipoCombustible');
            $carro->comentarios=$request->get('txtComentarios');
            $carro->precio=$request->get('txtPrecio');
            $carro->transmision=$request->get('cboTransmision');
            $carro->manejo=$request->get('cboManejo');
            $carro->colorExterior=$request->get('txtColorExterior');
            $carro->colorInterior=$request->get('txtColorInterior');
            $carro->fechaRegistro=$request->get('txtAnioRegistro')."/".$request->get('cboMes')."/".$request->get('cboDia');
            $carro->vin=$request->get('txtVIN');
            $carro->idUser=Auth::user()->id;
            $carro->estado=1;
            $carro->contadorImagenes=$maximoFotos;
            if(Auth::user()->tipo==0){
                $carro->estado=0;
            }

            $carro->save();

            $redirect='/carro/view/'.$carro->id;
            if(Auth::user()->tipo==0){
                $redirect='/usuario/pagar/'.$carro->id;
            }

            for($i=0;$i<$maximoFotos;$i++){
                $nombre=$i;

                $file=$request->file('img'.$i);
                $carpeta=$carro->id;
                \Storage::disk('local')->put('/images/carros/'.$carpeta.'/'.$nombre,  \File::get($file));

            }

            return redirect($redirect);

        }
        return redirect('/');
    }

    function mostrarCarro($id){
        $carros=DB::table('carros')->join('users','carros.idUser','=','users.id')
            ->join('tipos','carros.idTipo','=','tipos.id')
            ->join('modelos','carros.idModelo','=','modelos.id')
            ->join('marcas','modelos.idMarca','=','marcas.id')
            ->select('carros.*','marcas.nombre as marca','modelos.nombre as modelo','tipos.nombre as tipo', 'users.id as idUser', 'users.nombre as user', 'users.apellido', 'users.ciudad', 'users.contacto')
            ->where(function($query) use ($id){
                $query->where('carros.estado','1')
                ->where('carros.id',$id);
            })->where(function($query){
                $query->where('users.tipo','0');
            })->orwhere(function($query){
                $query->where('users.tipo','1')
                    ->where('users.status','1');
            })->get();

        $modelos=Modelos::all();
        $marcas=Marcas::all();
        $tipos=Tipos::all();

        $datos=[];
        $datos['carros']=$carros;
        $datos['modelos']=$modelos;
        $datos['marcas']=$marcas;
        $datos['tipos']=$tipos;
        if(Auth::check()){
            $u=Auth::user();
            $datos['user']=$u;
        }

        return view('carro.detalle',$datos);
    }

    function mandarMensaje(request $request){
        if(Auth::check()){
            $id=0;
            $mensaje=new Mensajes();
            $mensaje->idUserSend=$request->get('idUserSend');
            $mensaje->idUserReceive=$request->get('idUserReceive');
            $mensaje->mensaje=$request->get('txtMensaje');
            $mensaje->hora=date("H:i:s");
            $mensaje->fecha=date("Y") . "/" . date("m") . "/" . date("d");;
            $mensaje->estado=0;
            $mensaje->save();

            if(Auth::user()->id==$request->get('idUserSend')){
                $id=$request->get('idUserReceive');
            }
            else{
                $id=$request->get('idUserSend');
            }

            return redirect('/usuario/mensaje/'.$id);
        }

        return redirect('/');
    }
}
