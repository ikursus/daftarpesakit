<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class PesakitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $senaraiPesakit = DB::table('pesakit')->get();

        // Die & Dump
        // dd($senaraiPesakit);

        //return view('pesakit.template-index', ['senaraiPesakit' => $senaraiPesakit]);
        //return view('pesakit.template-index')->with('senaraiPesakit', $senaraiPesakit);
        return view('pesakit.template-index', compact('senaraiPesakit'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pesakit.template-daftar');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Dapatkan data daripada proses validation
        $data = $request->validate([
            'nama_pesakit' => ['required', 'min:3'],
            'jenis_pengenalan' => 'required|in:no_kp_baru,no_kp_lama,no_passport',
            'id_pengenalan' => ['required', 'unique:pesakit,id_pengenalan'],
            'kewarganegaraan' => ['required'],
            'jenis_appointment' => ['required']
        ]);

        // Additional data yang bukan dari form
        $data['mrn'] = Str::random(8);

        // Simpan data ke dalam table pesakit menerusi Query Builder
        // $pesakit = DB::table('pesakit')->insert($data);
        $pesakit = DB::table('pesakit')->insertGetId($data);

        // Response selepas data disimpan
        // return redirect('/pesakit/' . $pesakit . '/triage');
        // return redirect()->route('pesakit.triage.create', $pesakit);
        return to_route('pesakit.triage.create', $pesakit);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return 'Rekod pesakit';
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pesakit = DB::table('pesakit')->where('id', '=', $id)->first();

        return view('pesakit.template-edit', compact('pesakit'));
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
        // Dapatkan data daripada proses validation
        $data = $request->validate([
            'nama_pesakit' => ['required', 'min:3'],
            'jenis_pengenalan' => 'required|in:no_kp_baru,no_kp_lama,no_passport',
            'id_pengenalan' => ['required', 'unique:pesakit,id_pengenalan,' . $id],
            'kewarganegaraan' => ['required'],
            'jenis_appointment' => ['required']
        ]);

        $pesakit = DB::table('pesakit')->where('id', $id)->update($data);

        return redirect('/pesakit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pesakit = DB::table('pesakit')->where('id', $id)->delete();

        return redirect('/pesakit');
    }
}
