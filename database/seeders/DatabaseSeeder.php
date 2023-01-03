<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
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
                'address' => 'jlKambing',
                'created_at' => Carbon::now()
            ],
            [
                'email' => 'arnold@gmail.com',
                'username' => 'Arnold',
                'password' => bcrypt('arnold123'),
                'role' => 'Admin',
                'phone_number' => '0815151515',
                'address' => 'jlArnold',
                'created_at' => Carbon::now()
            ],
            [
                'email' => 'member@gmail.com',
                'username' => 'Member',
                'password' => bcrypt('member123'),
                'role' => 'Member',
                'phone_number' => '0815151515',
                'address' => 'jlMember',
                'created_at' => Carbon::now()
            ],
            [
                'email' => 'testing@gmail.com',
                'username' => 'testing',
                'password' => bcrypt('kopkop9090'),
                'role' => 'Member',
                'phone_number' => '12345678912',
                'address' => 'Binus Alsut',
                'created_at' => Carbon::now()
            ]
        ];
        DB::table('users')->insert($users);

        $carts = [
            [
                'user_id' => 3,
                'total_price' => '0',
                'status' => 'not checked out',
                'created_at' => Carbon::now()
            ]
        ];
        DB::table('carts')->insert($carts);

        $items = [
            [
                'image' => 'durian.png',
                'name' => 'Durian',
                'description' => 'Durian (Durio zibethinus) is a tropical fruit grown in Southeast Asia and highly appreciated by consumers throughout Asia. Folates are a group of vitamins and are essential nutrients for humans',
                'price' => 20000,
                'stock' => 20,
                'created_at' => Carbon::now()
            ],
            [
                'image' => 'asd.png',
                'name' => 'Trash',
                'description' => 'Trash damage or destroy something, either deliberately or because you did not take good care of it',
                'price' => 50000,
                'stock' => 90,
                'created_at' => Carbon::now()
            ],
            [
                'image' => 'asd.png',
                'name' => 'Dead',
                'description' => 'Trash damage or destroy something, either deliberately or because you did not take good care of it',
                'price' => 50000,
                'stock' => 90,
                'created_at' => Carbon::now()
            ],
            [
                'image' => 'asd.png',
                'name' => 'kkkimim',
                'description' => 'Trash damage or destroy something, either deliberately or because you did not take good care of it',
                'price' => 50000,
                'stock' => 90,
                'created_at' => Carbon::now()
            ],
            [
                'image' => 'asd.png',
                'name' => 'aksmdkamsdkams',
                'description' => 'Trash damage or destroy something, either deliberately or because you did not take good care of it',
                'price' => 50000,
                'stock' => 90,
                'created_at' => Carbon::now()
            ]
        ];
        DB::table('items')->insert($items);
        DB::table('items')->insert($items);
        DB::table('items')->insert($items);
        DB::table('items')->insert($items);
        DB::table('items')->insert($items);
        DB::table('items')->insert($items);
        DB::table('items')->insert($items);
        DB::table('items')->insert($items);
        DB::table('items')->insert($items);
        DB::table('items')->insert($items);
        DB::table('items')->insert($items);
        DB::table('items')->insert($items);
    }
}
