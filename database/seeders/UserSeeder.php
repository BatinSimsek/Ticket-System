<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Role;
use App\Models\Ticket;


class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $adminrole = Role::where('name', 'Admin')->first();

        $admin = User::create([
            'name'       => 'admin',
            'email'      => 'admin@admin.nl',
            'password'   => Hash::make('1234'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

       $admin->roles()->attach($adminrole);
    }
}
