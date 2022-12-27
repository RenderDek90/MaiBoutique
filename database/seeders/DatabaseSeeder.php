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
                'email' => 'darren123@gmail.com',
                'username' => 'Darren',
                'password' => bcrypt('darren123'),
                'role' => 'Admin',
                'phone_number' => '0815151515',
                'address' => 'jlKambing'
            ],
            [
                'email' => 'arnold@gmail.com',
                'username' => 'Arnold',
                'password' => bcrypt('arnold123'),
                'role' => 'Admin',
                'phone_number' => '0815151515',
                'address' => 'jlArnold'
            ],
            [
                'email' => 'member@gmail.com',
                'username' => 'Member',
                'password' => bcrypt('member123'),
                'role' => 'Member',
                'phone_number' => '0815151515',
                'address' => 'jlMember'
            ]
        ];

        DB::table('users')->insert($admin);

        $this->call(ItemSeeder::class);
    }
}
