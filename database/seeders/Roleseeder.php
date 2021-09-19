<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Roleseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('roles')->insert([
            ['name' => 'admin'],
            array('name' => 'moderator '),
            array('name' => 'user'),
            ['name' => 'maneger'],
            ['name' => 'HR'],
        ]);
    }
}
