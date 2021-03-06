<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
            // DB::table('roles')->insert([
            //     'name' => 'user',
            // ]);
            // DB::table('roles')->insert([
            //     'name' => 'manager',
            // ]);
            // DB::table('roles')->insert([
            //     'name' => 'admin',
            // ]);

        DB::table('roles')->upsert([
            [
                'id' => 1,
                'name' => 'user',
            ],
            [
                'id' => 2,
                'name' => 'manager',
            ],
            [
                'id' => 3,
                'name' => 'admin',
            ],
        ], 'id');
    }
}
