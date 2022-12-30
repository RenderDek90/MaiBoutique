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
        $users = [
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

        DB::table('users')->insert($users);

        $temp_data = [
            [
                'image' => 'durian.png',
                'name' => 'Durian',
                'description' => 'Durian (Durio zibethinus) is a tropical fruit grown in Southeast Asia and highly appreciated by consumers throughout Asia. Folates are a group of vitamins and are essential nutrients for humans',
                'price' => 20000,
                'stock' => 20
            ],
            [
                'image' => 'asd.png',
                'name' => 'Trash',
                'description' => 'Trash damage or destroy something, either deliberately or because you did not take good care of it',
                'price' => 50000,
                'stock' => 90
            ]
        ];

        DB::table('items')->insert($temp_data);
    }
}
