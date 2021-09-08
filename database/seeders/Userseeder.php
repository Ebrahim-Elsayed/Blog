<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class Userseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('users')->insert([
            array(
                'name' => 'admin',
                'email' => 'admin@info.com',
                'password' => Hash::make('password'),
                'role_id' => '1',
            ),

            array(
                'name' => 'moderator',
                'email' => 'moderator@info.com',
                'password' => Hash::make('password'),
                'role_id' => '2',
            ),
            
            array(
                'name' => 'user',
                'email' => 'user@info.com',
                'password' => Hash::make('password'),
                'role_id' => '3',
            ),
        ]);
    }
}
