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
        $ticketuser = Ticket::all();
        $adminrole = Role::where('name', 'Admin')->first();
        $userrole  = Role::where('name', 'User')->first();


        $admin = User::create([
            'name'       => 'admin',
            'email'      => 'admin@admin.com',
            'password'   => Hash::make('1234'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        $user = User::create([
            'name'       => 'user',
            'email'      => 'user@user.com',
            'password'   => Hash::make('1234'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        $userextra = User::create([
            'name'       => 'jeff',
            'email'      => 'users@users.com',
            'password'   => Hash::make('1234'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

       $user->ticket()->attach($ticketuser);
       $admin->roles()->attach($adminrole);
       $user->roles()->attach($userrole);
       $userextra->roles()->attach($userrole);

    }
}
