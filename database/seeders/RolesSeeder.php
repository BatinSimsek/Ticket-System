<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('roles')->insert([
            //admin
            [
                'name' => 'Admin',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Moderator',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'User',
                'created_at' => now(),
                'updated_at' => now()
            ],
        ]);
    }
}
