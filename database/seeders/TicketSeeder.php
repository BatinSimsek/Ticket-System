<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class TicketSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('tickets')->insert([
            [
                'title' => 'Pc wont start' ,
                'ticket'  => 'Pc wont start ',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Pc wont start' ,
                'ticket'  => 'Pc wont start ',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
