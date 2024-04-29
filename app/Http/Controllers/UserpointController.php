<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Request\UserpointUpdateRequest;
use App\Models\Userpoint;
use Illuminate\Support\Facades\DB;
use mysqli;

class UserpointController extends Controller
{
    //
    /*public function guardarPuntos(Request $request)
    {
        try {
            // Obtener los datos de la solicitud
            $userId = $request->input('userId');
            $puntos = $request->input('puntos');

            // Guardar los puntos en la base de datos
            $userPoint = new Userpoint();
            $userPoint->user_id = $userId;
            $userPoint->puntos = $puntos;
            $userPoint->save();

            // Retornar una respuesta
            return response()->json(['mensaje' => 'Puntos guardados correctamente'], 200);
        } catch (\Exception $e) {
            // Manejo de la excepción
            return response()->json(['mensaje' => 'Error al guardar puntos: ' . $e->getMessage()], 500);
        }
    }*/

    public function guardarPuntos(Request $request)
    {   
        // Obtén los datos del usuario y los puntos del cuerpo de la solicitud
        $user_id = $request->input('user_id');
        $point = $request->input('point');
    
        // Intenta actualizar el registro existente o crear uno nuevo
        $saved = Userpoint::updateOrCreate(
            ['user_id' => $user_id], // Condición para buscar el registro existente
            ['point' => $point]    // Datos para actualizar o crear el nuevo registro
        );
    
        // Retorna una respuesta al cliente
        if ($saved) {
            return response()->json(['mensaje' => 'Puntos guardados correctamente'], 200);
        } else {
            return response()->json(['mensaje' => 'Error al guardar los puntos'], 500);
        }
    }
    
    
    

    public function all()
    {
        $userp = \DB::table('userpoints')
        ->select('userpoints.*')
        ->get();
        return response(json_encode($userp),200)->header("Content-Type", "text/plain");
    }
}
