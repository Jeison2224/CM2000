<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;

class ItemController extends Controller
{
    //
    public function index() {
        $itemList = Item::all();
        return view('admin.item.all', ['itemList'=>$itemList]);
    }

    public function show($id) {
        $p = Item::find($id);
        $data['item'] = $p;
        return view('admin.item.show', $data);
    }

    public function create() {
        return view('admin.item.form');
    }

    public function store(Request $r) {
        $p = new Item();
        $p->name = $r->name;
        $p->description = $r->description;
        $p->precio = $r->precio;
        $p->cantidadclics = $r->cantidadclics;
        $p->save();
        return redirect()->route('admin.item.index');
    }

    public function edit($id) {
        $item = Item::find($id);
        return view('admin.item.form', array('item' => $item));
    }

    public function update($id, Request $r) {
        $p = Item::find($id);
        $p->name = $r->name;
        $p->description = $r->description;
        $p->precio = $r->precio;
        $p->cantidadclics = $r->cantidadclics;
        $p->save();
        return redirect()->route('admin.item.index');
    }

    public function destroy($id) {
        $p = Item::find($id);
        $p->delete();
        return redirect()->route('admin.item.index');
    }
}
