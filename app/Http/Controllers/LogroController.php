<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Logro;

class LogroController extends Controller
{
    //devuelve todos los datos de la tabla logros
    public function index() {
        $logroList = Logro::all();
        return view('admin.logro.all', ['logroList'=>$logroList]);
    }
    //devuelve el formulario para crear un logro
    public function show($id) {
        $p = Logro::find($id);
        $data['logro'] = $p;
        return view('admin.logro.show', $data);
    }
    //devuelve el formulario para crear un logro
    public function create() {
        $logro = Logro::all();
        return view('admin.logro.form');
    }
    //guarda un logro
    public function store(Request $r) {
        $p = new Logro();
        $p->name = $r->name;
        $p->description = $r->description;
        $p->point = $r->point;
        $p->save();
        return redirect()->route('admin.logro.index');
    }
    //devuelve el formulario para editar un logro
    public function edit($id) {
        $logro = Logro::find($id);
        return view('admin.logro.form', array('logro' => $logro));
    }
    //actualiza un logro
    public function update($id, Request $r) {
        $p = Logro::find($id);
        $p->name = $r->name;
        $p->description = $r->description;
        $p->point = $r->point;
        $p->save();
        return redirect()->route('admin.logro.index');
    }
    //elimina un logro
    public function destroy($id) {
        $p = Logro::find($id);
        $p->delete();
        return redirect()->route('admin.logro.index');
    }
    //devuelve al js un array con los logros
    public function VerLogro()
    {
        $logro = Logro::get();
        return response()->json($logro);
    }
}
