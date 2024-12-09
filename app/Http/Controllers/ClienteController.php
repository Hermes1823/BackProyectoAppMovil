<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cliente;
use Exception;

class ClienteController extends Controller
{
    public function index()
    {

        $ListaCliente = Cliente::all();
        return response()->json($ListaCliente);
    }

    public function store(Request $request)
    {

        try {
            $cliente = new Cliente();
            $cliente->dni = $request->dni;
            $cliente->nombres = $request->nombres;
            $cliente->email = $request->email;
            $cliente->direccion = $request->direccion;

            $cliente->save();

            $result = [
                'dni' => $cliente->dni,
                'nombres' => $cliente->nombres,
                'email' => $cliente->email,
                'direccion' => $cliente->direccion,
                'created' => true
            ];
            return $result;
        } catch (Exception $e) {
            return "Error fatal - " . $e->getMessage();
        }
    }

    public function show($id)
    {

        return cliente::find($id);
    }

    public function update(Request $request, $id)
    {

        $cliente = Cliente::findOrFail($id);
        $cliente->update($request->all());
        return $cliente;
    }

    public function destroy($id) {
        $cliente=Cliente::findOrFail($id);
        $cliente->delete();
        return 204;
    }

    public function delete($id) {

        $cliente=Cliente::findOrFail($id);
        $cliente->delete();
        return 204;

    }
}
