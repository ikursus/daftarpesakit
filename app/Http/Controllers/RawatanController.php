<?php

namespace App\Http\Controllers;

use App\Models\Rawatan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RawatanController extends Controller
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
        $pesakit = DB::table('pesakit')->whereId($id)->first();

        //$senaraiTriage = DB::table('triages')->where('pesakit_id', $id)->get();
        $senaraiRawatan = Rawatan::with('pesakit')->get();

        return view('pesakit.template-rawatan', compact('pesakit', 'senaraiRawatan'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {
        $request->validate([
            'nama_doktor' => ['required'],
            'id_doktor' => ['required'],
            'diagnosis' => ['required'],
        ]);

        $data = $request->all();

        $data['pesakit_id'] = $id;

        // Cara 1
        // $rawatan = new Rawatan;
        // $rawatan->pesakit_id = $id;
        // $rawatan->nama_doktor = $request->nama_doktor;
        // $rawatan->id_doktor = $request->id_doktor;
        // $rawatan->diagnosis = $request->diagnosis;
        // $rawatan->save();

        // Cara 2
        $rawatan = Rawatan::create($data);

        return back()->with('alert-success', 'Rekod rawatan berjaya disimpan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Rawatan  $rawatan
     * @return \Illuminate\Http\Response
     */
    public function show(Rawatan $rawatan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Rawatan  $rawatan
     * @return \Illuminate\Http\Response
     */
    public function edit(Rawatan $rawatan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Rawatan  $rawatan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Rawatan $rawatan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Rawatan  $rawatan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Rawatan $rawatan)
    {
        //
    }
}
