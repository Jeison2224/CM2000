<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Logro;

class LogroController extends Controller
{
    //
    public function index() {
        $logroList = Logro::all();
        return view('admin.logro.all', ['logroList'=>$logroList]);
    }

    public function show($id) {
        $p = Logro::find($id);
        $data['logro'] = $p;
        return view('admin.logro.show', $data);
    }

    public function create() {
        $logro = Logro::all();
        return view('admin.logro.form', array('logro' => $logro));
    }

    public function store(Request $r) {
        $p = new Logro();
        $p->name = $r->name;
        $p->description = $r->description;
        $p->point = $r->point;
        $p->save();
        return redirect()->route('admin.logro.index');
    }

    public function edit($id) {
        $logro = Logro::find($id);
        return view('admin.logro.form', array('logro' => $logro));
    }

    public function update($id, Request $r) {
        $p = Logro::find($id);
        $p->name = $r->name;
        $p->description = $r->description;
        $p->point = $r->point;
        $p->save();
        return redirect()->route('admin.logro.index');
    }

    public function destroy($id) {
        $p = Logro::find($id);
        $p->delete();
        return redirect()->route('admin.logro.index');
    }

    public function VerLogro()
    {
        $logro = Logro::get();
        return response()->json($logro);
    }
}
