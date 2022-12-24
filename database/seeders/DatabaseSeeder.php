<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        //Admin
        $admin = [
            [
            "email" => "darren123@gmail.com",
            "username" => "Darren",
            "password" => "darren123",
            "role" => "Admin",
            "phone_number" => "0815151515",
            "address" => "jlKambing"
            ],[
                "email" => "arnold@gmail.com",
                "username" => "Arnold",
                "password" => "arnold123",
                "role" => "Admin",
                "phone_number" => "0815151515",
                "address" => "jlArnold"
            ]
        ];

        DB::table('users')->insert($admin);
    }
}
