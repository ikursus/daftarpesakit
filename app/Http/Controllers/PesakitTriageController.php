<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PesakitTriageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        //$pesakit = DB::table('pesakit')->where('id', '=', $id)->first();
        $senaraiBilikRawatan = DB::table('bilik_rawatan')->select('nama_bilik')->get();

        $pesakit = DB::table('pesakit')->whereId($id)->first();

        //$senaraiTriage = DB::table('triages')->where('pesakit_id', $id)->get();
        $senaraiTriage = DB::table('pesakit')
        ->join('triages', 'pesakit.id', '=', 'triages.pesakit_id')
        ->select(
            'triages.id as triage_id',
            'triages.bilik_rawatan',
            'triages.prosedur',
            'triages.tarikh_rawatan',
            'pesakit.*'
        )
        ->get();

        return view('pesakit.template-triage', compact('pesakit', 'senaraiBilikRawatan', 'senaraiTriage'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {
        $data = $request->validate([
            'bilik_rawatan' => ['required'],
            'tarikh_rawatan' => ['required', 'date_format:Y-m-d'],
            'prosedur' => ['required'],
        ]);

        $data['pesakit_id'] = $id;

        DB::table('triages')->insert($data);

        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
