<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactosController;
use App\Http\Controllers\DirectoriosController;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/directorios/mostrar',[DirectoriosController::class,'mostrarAll'])->name('directorios.mostrar');

Route::get('/directorios/agregar',[DirectoriosController::class,'vistaAgregar'])->name('directorios.agregar');

Route::get('/directorios/buscar',[DirectoriosController::class,'vistaBuscar'])->name('directorios.buscar');

Route::get('/directorios/contactos/{id}',[ContactosController::class,'vistaContactos'])->name('directorios.contactos');

Route::get('/directorios/eliminar/{id}',[DirectoriosController::class,'vistaEliminar'])->name('directorios.eliminar');

Route::get('/directorios/destroy/{id}',[DirectoriosController::class,'destroy'])->name('directorios.destroy');

Route::post('/directorios/guardar',[DirectoriosController::class,'guardar'])->name('directorios.guardar');

Route::get('/directorios/buscar/dir',[DirectoriosController::class,'buscar'])->name('directorios.buscar.dir');

Route::get('/contactos/agregar/{id}',[ContactosController::class,'vistaAgregar'])->name('contactos.agregar');

Route::post('/contactos/guardar',[ContactosController::class,'guardarContacto'])->name('contactos.guardar');

