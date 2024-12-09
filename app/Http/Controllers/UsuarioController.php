<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Exception;
use Illuminate\Http\Request;

class UsuarioController extends Controller
{
   public static function verificaemail($email){
      try{
        $resultdata=Usuario::select('id','email')
        ->where('email','=',$email)
        ->where('estado','=',1)
        ->first();

        if($resultdata==null){
            return response()->json([
                "status" => 400,
                "data" => $resultdata,
                "login" => false
            ]);

        }else{
            return response()->json([
                "status"=>200,
                "data"=>$resultdata,
                "login"=>true
            ]);
        }

      }catch(Exception $ex){
        return response()->json([
            "status"=>500,
            "error"=>"Error: ". $ex->getMessage()
        ]);
      }
   }
   public static function verificaclave($email,$password)
   {
       $resultdata ='';
       try{
           $resultdata = Usuario::select('id','email')
           ->where('email', '=', $email)
           ->where('password', '=', $password)
           ->where('estado', '=', 1)
           ->first();

           if($resultdata == null){
               return response()->json([
                   "status" => 400,
                   "data" => $resultdata,
                   "login" => false
               ]);
             }
           else
           {
               return response()->json([
                   "status" => 200,
                   "data" => $resultdata,
                   "login" => true
               ]);
           }
       }catch (Exception $e) {
           return response()->json([
               "status" => 500,
               "error" => "Error: " . $e->getMessage()
           ]);
       }
   }

   public static function register(Request $request)
    {
        // Validación de los datos
        $request->validate([
            'email' => 'required|email|unique:usuarios,email|max:20',
            'password' => 'required|string|min:6',
        ]);

        try {
            // Creación del nuevo usuario
            $usuario = new Usuario();
            $usuario->email = $request->email;
            $usuario->password = bcrypt($request->password); // Encriptar la contraseña
            $usuario->estado = 1; // O el valor que desees para estado
            $usuario->save();

            return response()->json(['message' => 'Usuario registrado con éxito.'], 201);
        } catch (Exception $ex) {
            return response()->json([
                "status" => 500,
                "error" => "Error: " . $ex->getMessage()
            ]);
        }
    }

}
