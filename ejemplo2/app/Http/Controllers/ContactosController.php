<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contacto;

class ContactosController extends Controller
{
    public function vistaContactos($id){
        $contactos = Contacto::where('codigoEntrada', $id)->get();

        echo $contactos;
        return view('vercontactos',compact('contactos'))->with('numeroEntradaR', $id);
    }
    
/*
    public function destroyCod($id){
        $contactos = Contacto::where('codigoEntrada',$id)->get();
        $contactos->delete();
    }*/

    public function vistaAgregar($id){
       // $contactos = Contacto::where('codigoEntrada',$id)->get();
        return view('agregarcontacto',['numeroEntradaR'=>$id]);
    }

    public function guardarContacto(Request $request){
        $nvoContacto = new Contacto();
        $nvoContacto->codigoEntrada = $request->codigo;
        $nvoContacto->nombre = $request->nombre;
        $nvoContacto->apellido = $request->apellido;
        $nvoContacto->telefono = $request->telefono;
        $nvoContacto->save();

        return redirect('/directorios/contactos/'.$request->codigo);
    }
}
