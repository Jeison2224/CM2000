<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Request\UserpointUpdateRequest;
use App\Models\Userpoint;
use Illuminate\Support\Facades\DB;
use mysqli;

class UserpointController extends Controller
{
    public function index() {
        $userpointList = Userpoint::all();
        return view('admin.userpoint.all', ['userpointList'=>$userpointList]);
    }

    public function show($id) {
        $p = Userpoint::find($id);
        $data['userpoint'] = $p;
        return view('admin.userpoint.show', $data);
    }

    public function create() {
        $userpoint = Userpoint::all();
        return view('admin.userpoint.form');
    }

    public function store(Request $r) {
        $p = new Userpoint();
        $p->user_id = $r->user_id;
        $p->point = $r->point;
        $p->save();
        return redirect()->route('admin.userpoint.index');
    }

    public function edit($id) {
        $userpoint = Userpoint::find($id);
        return view('admin.userpoint.form', array('userpoint' => $userpoint));
    }

    public function update($id, Request $r) {
        $p = Userpoint::find($id);
        $p->user_id = $r->user_id;
        $p->point = $r->point;
        $p->save();
        return redirect()->route('admin.userpoint.index');
    }

    public function destroy($id) {
        $p = Userpoint::find($id);
        $p->delete();
        return redirect()->route('admin.userpoint.index');
    }
    public function guardarPuntos(Request $request)
    {   
        // Obtén los datos del usuario y los puntos del cuerpo de la solicitud
        $user_id = auth()->id();
        $point = $request->input('point');
    
        // Intenta actualizar el registro existente o crear uno nuevo
        //$saved = 
        Userpoint::updateOrCreate(
            ['user_id' => $user_id], // Condición para buscar el registro existente
            ['point' => $point]    // Datos para actualizar o crear el nuevo registro
        );
    
        // Retorna una respuesta al cliente
        //$saved
        /*if ($saved) {
            return response()->json(['mensaje' => 'Puntos guardados correctamente'], 200);
        } else {
            return response()->json(['mensaje' => 'Error al guardar los puntos'], 500);
        }*/
    }
    
    public function allUser()
    {
        $id = auth()->id(); 
        $userPoints = Userpoint::where('user_id', $id)->get(); 
        return response()->json($userPoints); 
    }

}
