<?php

namespace App\Http\Controllers;
use App\Models\Libro;

use Illuminate\Http\Request;
use Exception;

class LibroController extends Controller
{
    public function index()
    {
        return Libro::all();
    }


    public function store(Request $request)
    {
        try{
            $libro=new Libro();
            $libro->titulo=$request->titulo;
            $libro->editorial=$request->editorial;
            $libro->anopublicacion=$request->anopublicacion;
            $libro->cantidad=$request->cantidad;
            $libro->estado=1;
            $libro->save();
            $result=[
            'idLibro'=>$libro->idLibro,
            'titulo'=>$request->titulo,
            'editorial'=>$request->editorial,
            'anopublicacion'=>$request->anopublicacion,
            'cantidad'=>$request->cantidad,
            'estado'=>$request->estado
            ];
            return $result;
            }
        catch(Exception $e){
            return "Error fatal - ".$e->getMessage();
        } 
    }

    public function show($id)
    {
        return Libro::find($id);
    }


    public function update(Request $request, $id)
    {
        $libro=Libro::findOrFail($id);
        $libro->update($request->all());
        return $libro;
    }


    public function destroy($id)
    {
        $libro=Libro::findOrFail($id);
        $libro->delete();
        return 204;
    }


    public function delete($id)
    {
        $libro=Libro::findOrFail($id);
        $libro->delete();
        return 204;
    }


    public function Listado(Request $request)
    {
        $ListaLibro=Libro::all();
        return response()->json($ListaLibro);
    }
}
