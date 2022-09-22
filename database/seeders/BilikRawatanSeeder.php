<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class BilikRawatanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('bilik_rawatan')->insert([
            'nama_bilik' => 'Bilik 1'
        ]);


        DB::table('bilik_rawatan')->insert([
            'nama_bilik' => 'Bilik 2'
        ]);


        DB::table('bilik_rawatan')->insert([
            'nama_bilik' => 'Bilik 3'
        ]);


        DB::table('bilik_rawatan')->insert([
            'nama_bilik' => 'Bilik 4'
        ]);


        DB::table('bilik_rawatan')->insert([
            'nama_bilik' => 'Bilik 5'
        ]);
    }
}
