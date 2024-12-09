<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categoria;
use Exception;

class CategoriaController extends Controller
{
    //public function index()
//{
//$ListaCategoria=Categoria::where('estado','=','1')->get();
//return response()->json($ListaCategoria);
//}

 // Método para obtener todas las categorías
 public function index()
 {
     $ListaCategorias = Categoria::all();
     return response()->json($ListaCategorias);
 }

 // Método para almacenar una nueva categoría
 public function store(Request $request)
 {
     try {
         $categoria = new Categoria();
         $categoria->descripcion = $request->descripcion;
         $categoria->estado = $request->estado;

         $categoria->save();

         $result = [
             'descripcion' => $categoria->descripcion,
             'estado' => $categoria->estado,
             'created' => true
         ];
         return response()->json($result);
     } catch (Exception $e) {
         return response()->json(['error' => 'Error fatal - ' . $e->getMessage()], 500);
     }
 }

 // Método para mostrar una categoría específica por su ID
 public function show($id)
 {
     $categoria = Categoria::find($id);
     if (!$categoria) {
         return response()->json(['error' => 'Categoría no encontrada'], 404);
     }
     return response()->json($categoria);
 }

 // Método para actualizar una categoría específica
 public function update(Request $request, $id)
 {
     try {
         $categoria = Categoria::findOrFail($id);
         $categoria->update($request->all());
         return response()->json($categoria);
     } catch (Exception $e) {
         return response()->json(['error' => 'Error fatal - ' . $e->getMessage()], 500);
     }
 }

 // Método para eliminar una categoría específica
 public function destroy($id)
 {
     try {
         $categoria = Categoria::findOrFail($id);
         $categoria->delete();
         return response()->json(null, 204);
     } catch (Exception $e) {
         return response()->json(['error' => 'Error fatal - ' . $e->getMessage()], 500);
     }
 }

}
