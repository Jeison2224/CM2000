<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Request\UserpointUpdateRequest;
use App\Models\Userpoint;
use Illuminate\Support\Facades\DB;
use mysqli;

class UserpointController extends Controller
{
    //devuelve todos los datos de la tabla userpoints
    public function index() {
        $userpointList = Userpoint::all();
        return view('admin.userpoint.all', ['userpointList'=>$userpointList]);
    }
    //devuelve el formulario de creación de un nuevo registro
    public function show($id) {
        $p = Userpoint::find($id);
        $data['userpoint'] = $p;
        return view('admin.userpoint.show', $data);
    }
    //devuelve el formulario de edición de un registro
    public function create() {
        $userpoint = Userpoint::all();
        return view('admin.userpoint.form');
    }
    //guarda un nuevo registro en la tabla userpoints
    public function store(Request $r) {
        $p = new Userpoint();
        $p->user_id = $r->user_id;
        $p->point = $r->point;
        $p->save();
        return redirect()->route('admin.userpoint.index');
    }
    //actualiza un registro de la tabla userpoints
    public function edit($id) {
        $userpoint = Userpoint::find($id);
        return view('admin.userpoint.form', array('userpoint' => $userpoint));
    }
    //actualiza un registro de la tabla userpoints
    public function update($id, Request $r) {
        $p = Userpoint::find($id);
        $p->user_id = $r->user_id;
        $p->point = $r->point;
        $p->save();
        return redirect()->route('admin.userpoint.index');
    }
    //elimina un registro de la tabla userpoints
    public function destroy($id) {
        $p = Userpoint::find($id);
        $p->delete();
        return redirect()->route('admin.userpoint.index');
    }
    //guarda los puntos de un usuario
    public function guardarPuntos(Request $request)
    {   
        $user_id = auth()->id();
        $point = $request->input('point');
    
        Userpoint::updateOrCreate(
            ['user_id' => $user_id], 
            ['point' => $point]    
        );
    }
    //devuelve al js un array con los puntos de usuario
    public function allUser()
    {
        $id = auth()->id(); 
        $userPoints = Userpoint::where('user_id', $id)->get(); 
        return response()->json($userPoints); 
    }

}
