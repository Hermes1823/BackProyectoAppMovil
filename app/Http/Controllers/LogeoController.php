<?php

namespace App\Http\Controllers;

use App\Models\Logeo;
use Illuminate\Http\Request;

use Exception;

class LogeoController extends Controller
{
    public static function verificaemail($email){
        try{
          $resultdata=Logeo::select('IdUsuario','Email')
          ->where('Email','=',$email)
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
             $resultdata = Logeo::select('IdUsuario','Email')
             ->where('Email', '=', $email)
             ->where('Contraseña', '=', $password)
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

     public function listarUsuarios()
{
    try {
        $usuarios = Logeo::select('IdUsuario', 'Email')->get();

        return response()->json([
            "status" => 200,
            "data" => $usuarios,
            "message" => "Usuarios listados correctamente."
        ]);
    } catch (Exception $ex) {
        return response()->json([
            "status" => 500,
            "error" => "Error: " . $ex->getMessage()
        ]);
    }
}
  
    
}
