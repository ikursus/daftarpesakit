<?php

namespace App\Http\Controllers;

use App\Models\Pesakit;
use Illuminate\Http\Request;
use App\Exports\PesakitExport;
use Illuminate\Support\Facades\File;
use Maatwebsite\Excel\Facades\Excel;

class DownloadController extends Controller
{
    public function pesakitJson()
    {
        $pesakit = Pesakit::all();
        $json['data'] = json_encode($pesakit);

        $fileName = date('Ymdhis') . '-pesakit.json';
        File::put(public_path('/upload/'. $fileName), $json);

        return response()->download(public_path('/upload/'. $fileName));
    }

    public function pesakitExcel()
    {
        return Excel::download(new PesakitExport, date('Ymdhis') . 'pesakit.xlsx');
    }
}
