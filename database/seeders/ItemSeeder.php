<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $temp_data = [
            [
                'image' => 'durian.png',
                'name'=> 'Durian',
                'description' => 'Durian (Durio zibethinus) is a tropical fruit grown in Southeast Asia and highly appreciated by consumers throughout Asia. Folates are a group of vitamins and are essential nutrients for humans',
                'price' => 20000,
                'stock' => 20
            ],[
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
