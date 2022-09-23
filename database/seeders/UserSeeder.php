<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Super Admin',
            'email' => 'superadmin@gmail.com',
            'password' => bcrypt('password123'),
            'nokp' => '808080808080',
            'phone' => '0123456789'
        ]);

        User::create([
            'name' => 'Staff 1',
            'email' => 'staff1@gmail.com',
            'password' => bcrypt('password123'),
            'nokp' => '909090909090',
            'phone' => '0123456789'
        ]);
    }
}
