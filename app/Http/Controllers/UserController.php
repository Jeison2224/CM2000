<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    //
    public function index() {
        $userList = User::all();
        return view('admin.user.all', ['userList'=>$userList]);
    }

    public function show($id) {
        $p = User::find($id);
        $data['user'] = $p;
        return view('admin.user.show', $data);
    }

    public function create() {
        $user = User::all();
        return view('admin.user.form', array('user' => $user));
    }

    public function store(Request $r) {
        $p = new User();
        $p->name = $r->name;
        $p->email = $r->email;
        $p->save();
        return redirect()->route('admin.user.index');
    }

    public function edit($id) {
        $user = User::find($id);
        return view('admin.user.form', array('user' => $user));
    }

    public function update($id, Request $r) {
        $p = User::find($id);
        $p->name = $r->name;
        $p->email = $r->email;
        $p->save();
        return redirect()->route('admin.user.index');
    }

    public function destroy($id) {
        $p = User::find($id);
        $p->delete();
        return redirect()->route('admin.user.index');
    }

}
