<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'nama' => 'Admin 1',
                'roles' => 'admin',
                'email' => 'admin1@gmail.com',
                'email_verified_at' => now(),
                'password' => Hash::make('admin123')
            ],
        ]);
    }
}
