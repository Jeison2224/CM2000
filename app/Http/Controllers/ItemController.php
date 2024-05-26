<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;

class ItemController extends Controller
{
    //devuelve todos los datos de la tabla
    public function index() {
        $itemList = Item::all();
        return view('admin.item.all', ['itemList'=>$itemList]);
    }
    //devuelve el formulario para crear un nuevo item
    public function show($id) {
        $p = Item::find($id);
        $data['item'] = $p;
        return view('admin.item.show', $data);
    }
    //devuelve el formulario para editar un item
    public function create() {
        return view('admin.item.form');
    }
    //guarda un nuevo item
    public function store(Request $r) {
        $p = new Item();
        $p->name = $r->name;
        $p->description = $r->description;
        $p->precio = $r->precio;
        $p->cantidadclics = $r->cantidadclics;
        $p->save();
        return redirect()->route('admin.item.index');
    }
    //devuelve el formulario para editar un item
    public function edit($id) {
        $item = Item::find($id);
        return view('admin.item.form', array('item' => $item));
    }
    //actualiza un item
    public function update($id, Request $r) {
        $p = Item::find($id);
        $p->name = $r->name;
        $p->description = $r->description;
        $p->precio = $r->precio;
        $p->cantidadclics = $r->cantidadclics;
        $p->save();
        return redirect()->route('admin.item.index');
    }
    //elimina un item
    public function destroy($id) {
        $p = Item::find($id);
        $p->delete();
        return redirect()->route('admin.item.index');
    }
    //devuelve al js un array con los items
    public function VerItem(){
        $item = Item::get();
        return response()->json($item);
    }
}
