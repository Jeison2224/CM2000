<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ranking;

class RankingController extends Controller
{
    //
    public function index() {
        $rankingList = Ranking::all();
        return view('admin.ranking.all', ['rankingList'=>$rankingList]);
    }

    public function show($id) {
        $p = Ranking::find($id);
        $data['ranking'] = $p;
        return view('admin.ranking.show', $data);
    }

    public function create() {
        return view('admin.ranking.form');
    }

    public function store(Request $r) {
        $p = new Ranking();
        $p->name = $r->name;
        $p->point = $r->point;
        $p->save();
        return redirect()->route('admin.ranking.index');
    }

    public function edit($id) {
        $ranking = Ranking::find($id);
        return view('admin.ranking.form', array('ranking' => $ranking));
    }

    public function update($id, Request $r) {
        $p = Ranking::find($id);
        $p->name = $r->name;
        $p->point = $r->point;
        $p->save();
        return redirect()->route('admin.ranking.index');
    }

    public function destroy($id) {
        $p = Ranking::find($id);
        $p->delete();
        return redirect()->route('admin.ranking.index');
    }

    public function VerRanking()
    {
        $ranking = Ranking::get();
        return response()->json($ranking);
    }
}
