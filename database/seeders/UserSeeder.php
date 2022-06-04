<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

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
                'firstname' => 'Leon', 
                'lastname' => 'Mathis', 
                'email' => 'leon@gmail.com',
                'is_admin' => 1,
                'password' => bcrypt('leon123$$'),
            ]
        ]);
    }
}
