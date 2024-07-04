<?php

namespace App\Http\Controllers;

use App\Http\Controllers\ContactosController;
use Illuminate\Http\Request;
use App\Models\Contacto;
use App\Models\Directorio;

class DirectoriosController extends Controller
{
    //

    public function mostrarAll(){
        $directorios = Directorio::all();

        return view('directorio', compact('directorios'));
    }

    public function vistaAgregar(){
        return view('crearEntrada');
    }

    public function vistaBuscar(){
        return view('buscar');
    }

    public function vistaEliminar($id){
        $directorio = Directorio::find($id);
        return view('eliminar',compact('directorio'));
    }

    public function destroy($id){
        Contacto::where('codigoEntrada',$id)->delete();


        $directorio = Directorio::find($id);
        $directorio->delete();

        return redirect('/directorios/mostrar');
    }

    public function guardar(Request $request){
        $nvoDirectorio = new Directorio();
        $nvoDirectorio->codigoEntrada = $request->codigo;
        $nvoDirectorio->nombre = $request->nombre;
        $nvoDirectorio->apellido = $request->apellido;
        $nvoDirectorio->telefono = $request->telefono;
        $nvoDirectorio->correo = $request->correo;
        $nvoDirectorio->save();

        return redirect('/directorios/mostrar');
    }

    public function buscar(Request $request){
        $correo = $request->correo;

    //    echo $correo;

        $directorio = Directorio::where('correo', $correo)->get();
      //  echo $directorio[0]->codigoEntrada;
        $id = $directorio[0]->codigoEntrada;
        return redirect('/directorios/contactos/'.$id);
    }

    
}
