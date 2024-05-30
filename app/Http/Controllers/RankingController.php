<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ranking;

class RankingController extends Controller
{
    //devuelve todos los datos de la tabla ranking
    public function index() {
        $rankingList = Ranking::all();
        return view('admin.ranking.all', ['rankingList'=>$rankingList]);
    }
    //devuelve los datos de un ranking en especifico
    public function show($id) {
        $p = Ranking::find($id);
        $data['ranking'] = $p;
        return view('admin.ranking.show', $data);
    }
    //devuelve el formulario para crear un ranking
    public function create() {
        return view('admin.ranking.form');
    }
    //guarda un ranking en la base de datos
    public function store(Request $r) {
        $p = new Ranking();
        $p->name = $r->name;
        $p->point = $r->point;
        $p->save();
        return redirect()->route('admin.ranking.index');
    }
    //devuelve el formulario para editar un ranking
    public function edit($id) {
        $ranking = Ranking::find($id);
        return view('admin.ranking.form', array('ranking' => $ranking));
    }
    //actualiza un ranking en la base de datos
    public function update($id, Request $r) {
        $p = Ranking::find($id);
        $p->name = $r->name;
        $p->point = $r->point;
        $p->save();
        return redirect()->route('admin.ranking.index');
    }
    //elimina un ranking de la base de datos
    public function destroy($id) {
        $p = Ranking::find($id);
        $p->delete();
        return redirect()->route('admin.ranking.index');
    }
    //devuelve al js un array con los rankings
    public function VerRanking() {
        $ranking = Ranking::orderByDesc('point')->take(10)->get();
        return response()->json($ranking);
    }
}
