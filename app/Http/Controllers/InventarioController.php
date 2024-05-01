<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Inventario;

class InventarioController extends Controller
{
    //
    public function index() {
        $inventarioList = Inventario::all();
        return view('admin.inventario.all', ['inventarioList'=>$inventarioList]);
    }

    public function show($id) {
        $p = Inventario::find($id);
        $data['inventario'] = $p;
        return view('admin.inventario.show', $data);
    }

    public function create() {
        $inventario = Inventario::all();
        return view('admin.inventario.form', array('inventario' => $inventario));
    }

    public function store(Request $r) {
        $p = new Inventario();
        $p->name = $r->name;
        $p->email = $r->email;
        $p->save();
        return redirect()->route('admin.inventario.index');
    }

    public function edit($id) {
        $inventario = Inventario::find($id);
        return view('admin.inventario.form', array('inventario' => $inventario));
    }

    public function update($id, Request $r) {
        $p = Inventario::find($id);
        $p->name = $r->name;
        $p->email = $r->email;
        $p->save();
        return redirect()->route('admin.inventario.index');
    }

    public function destroy($id) {
        $p = Inventario::find($id);
        $p->delete();
        return redirect()->route('admin.inventario.index');
    }
}
