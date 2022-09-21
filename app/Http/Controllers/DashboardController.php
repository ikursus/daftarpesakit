<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function __invoke()
    {
        $titleDariFunction = '<script>alert("test")</script><span style="color: red">DASHBOARD</span>';

        $subTitle = 'Halaman Dashboard Ahli';

        $dataSenaraiAhli = [
            ['nama' => 'Ali', 'email' => 'ali@gmail.com'],
            ['nama' => 'Ali2', 'email' => 'ali2@gmail.com'],
            ['nama' => 'Ali3', 'email' => 'ali3@gmail.com'],
            ['nama' => 'Ali4', 'email' => 'ali4@gmail.com'],
        ];

        // Cara 1 Attach Data
        return view('template-dashboard')->with('titleDiTemplate', $titleDariFunction)
        ->with('subTitle', $subTitle)
        ->with('dataSenaraiAhli', $dataSenaraiAhli);
        // Cara 2 Attach Data
        // return view('template-dashboard', [
        //     'titleDiTemplate' => $titleDariFunction,
        //     'subTitle' => $subTitle,
        //     'dataSenaraiAhli' => $dataSenaraiAhli,
        // ]);
        // Cara 3 Attach Data
        // return view('template-dashboard', compact(
        //     'titleDariFunction',
        //     'subTitle',
        //     'dataSenaraiAhli'
        // ));
    }
}
