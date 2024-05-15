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
        return view('admin.inventario.form');
    }

    public function store(Request $r) {
        $p = new Inventario();
        $p->item_id = $r->item_id;
        $p->user_id = $r->user_id;
        $p->cantidad = $r->cantidad;
        $p->save();
        return redirect()->route('admin.inventario.index');
    }

    public function edit($id) {
        $inventario = Inventario::find($id);
        return view('admin.inventario.form', array('inventario' => $inventario));
    }

    public function update($id, Request $r) {
        $p = Inventario::find($id);
        $p->item_id = $r->item_id;
        $p->user_id = $r->user_id;
        $p->cantidad = $r->cantidad;
        $p->save();
        return redirect()->route('admin.inventario.index');
    }

    public function destroy($id) {
        $p = Inventario::find($id);
        $p->delete();
        return redirect()->route('admin.inventario.index');
    }

    public function guardarInventario(Request $request)
    {
        // Decodifica los datos JSON recibidos desde el frontend
        $inventoryData = json_decode($request->getContent(), true);
        $user_id = auth()->id();
    
        // Itera sobre los ítems del inventario
        foreach ($inventoryData['items'] as $item) {
            // Actualiza o crea el registro en la base de datos
            Inventario::updateOrCreate(
                ['user_id' => $user_id, 'item_id' => $item['id']],
                ['cantidad' => $item['cantidad']]
            );
        }
    
        // Retorna una respuesta al frontend (opcional)
        //return response()->json(['message' => 'Inventario actualizado correctamente'], 200);
    }

    public function VerInventario()
{
    $user_id = auth()->id();
    $inventario = Inventario::where('user_id', $user_id)->get();
    return response()->json($inventario);
}
    
}
