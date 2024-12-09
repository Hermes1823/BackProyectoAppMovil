<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;
use Exception;

class ProductoController extends Controller
{
    public function index(){
        $ListaProducto = Producto::with('categoria')->where('estado', '=', '1')->get();
        return response()->json($ListaProducto);
    }
    
public function store(Request $request)
{
try{
$producto=new Producto();
$producto->descripcion=$request->descripcion;
$producto->idcategoria=$request->idcategoria;
$producto->precio=$request->precio;
$producto->cantidad=$request->cantidad;
$producto->estado=1;
$producto->save();
$result=[
'descripcion'=>$producto->descripcion,
'idcategoria'=>$producto->idcategoria,
'precio'=>$producto->precio,
'cantidad'=>$producto->cantidad,
'created' => true];
return $result;
}
catch(Exception $e){
return "Error fatal - ".$e->getMessage();
}
}
public function show($id)
{
return producto::find($id);
}
public function update(Request $request, $id)
{
$producto=Producto::findOrFail($id);
$producto->update($request->all());
return $producto;
}

public function destroy($id)
{
    $producto=Producto::findOrFail($id);
    $producto->delete();
    return 204;
}


public function delete($id)
{
    $producto=Producto::findOrFail($id);
    $producto->delete();
    return 204;
}
}
