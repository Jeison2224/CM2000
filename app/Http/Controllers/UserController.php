<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    //devuelve todos los datos de la tabla user
    public function index() {
        $userList = User::all();
        return view('admin.user.all', ['userList'=>$userList]);
    }
    //devuelve el formulario de creacion de un usuario
    public function show($id) {
        $p = User::find($id);
        $data['user'] = $p;
        return view('admin.user.show', $data);
    }
    //devuelve el formulario de edicion de un usuario
    public function create() {
        $user = User::all();
        return view('admin.user.form');
    }
    //guarda los datos del formulario de creacion de un usuario
    public function store(Request $r) {
        $p = new User();
        $p->name = $r->name;
        $p->email = $r->email;
        $p->password = $r->password;
        $p->save();
        return redirect()->route('admin.user.index');
    }
    //guarda los datos del formulario de edicion de un usuario
    public function edit($id) {
        $user = User::find($id);
        return view('admin.user.form', array('user' => $user));
    }
    //actualiza los datos del formulario de edicion de un usuario
    public function update($id, Request $r) {
        $p = User::find($id);
        $p->name = $r->name;
        $p->email = $r->email;
        $p->password = $r->password;
        $p->save();
        return redirect()->route('admin.user.index');
    }
    //elimina un usuario
    public function destroy($id) {
        $p = User::find($id);
        $p->delete();
        return redirect()->route('admin.user.index');
    }

}
