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

            // Hat
            [
                'image' => 'hat1.png',
                'name' => 'Cowboy Hat',
                'description' => 'The cowboy hat is a high-crowned, wide-brimmed hat best known as the defining piece of attire for the North American cowboy.',
                'price' => 400000,
                'stock' => 37,
                'created_at' => Carbon::now()
            ],
            [
                'image' => 'hat2.png',
                'name' => 'Bucket Hat',
                'description' => "A bucket hat (variations of which include the fisherman's hat, Irish country hat and session hat) is a hat with a narrow, downward-sloping brim.",
                'price' => 220400,
                'stock' => 70,
                'created_at' => Carbon::now()
            ],
            [
                'image' => 'hat3.png',
                'name' => 'Baseball Cap',
                'description' => 'A baseball cap is a close-fitting cap with a curved part at the front that sticks out above your eyes.',
                'price' => 45000,
                'stock' => 50,
                'created_at' => Carbon::now()
            ],
            [
                'image' => 'hat4.png',
                'name' => 'French Barret (Laulhère)',
                'description' => 'The beret is emblematic of non-conformism. It is worn by people who create, commit, militate, and resist. The Black Panthers are an example of a movement that used the beret as a symbol of revolution.',
                'price' => 640000,
                'stock' => 70,
                'created_at' => Carbon::now()
            ],
            [
                'image' => 'hat5.png',
                'name' => 'Fedora Hat',
                'description' => 'A fedora is a hat with a soft brim and indented crown. It is typically creased lengthwise down the crown and "pinched" near the front on both sides. Fedoras can also be creased with teardrop crowns, diamond crowns, center dents, and others, and the positioning of pinches can vary.',
                'price' => 200000,
                'stock' => 86,
                'created_at' => Carbon::now()
            ],

            //Shirt
            [
                'image' => 'Shirt1.png',
                'name' => 'Dark Orange T-shirt',
                'description' => 'According to some color psychology sources, dark orange can represent negative factors like pride, greed, and selfishness — however, other sources note that this earthy orange color can represent physical strength, extroversion, and positive social characteristics.',
                'price' => 99000,
                'stock' => 70,
                'created_at' => Carbon::now()
            ],
            [
                'image' => 'Shirt2.png',
                'name' => 'Black T-shirt',
                'description' => "Black t-shirt, a member of a fascist organization having a black shirt as a distinctive part of its uniform. especially : a member of the Italian Fascist party",
                'price' => 99000,
                'stock' => 70,
                'created_at' => Carbon::now()
            ],
            [
                'image' => 'Shirt3.jpg',
                'name' => 'Light Orange T-Shirt',
                'description' => 'Light orange: Pale and light hues of orange evoke feelings of friendliness, good health, and are soothing',
                'price' => 99000,
                'stock' => 70,
                'created_at' => Carbon::now()
            ],
            [
                'image' => 'Shirt4.png',
                'name' => 'Red T-shirt',
                'description' => 'In physics, the longest wavelength of light discernible to the human eye. It falls in the range of 620 until 750 nanometres in the visible spectrum. In art, red is a colour on the conventional wheel, located between violet and orange and opposite green, its complement.',
                'price' => 99000,
                'stock' => 70,
                'created_at' => Carbon::now()
            ],
            [
                'image' => 'Shirt5.png',
                'name' => 'Green T-shirt',
                'description' => 'Green is often described as a refreshing and tranquil color. Other common associations with the color green are money, luck, health, and envy.',
                'price' => 99000,
                'stock' => 70,
                'created_at' => Carbon::now()
            ],

            //pants
            [
                'image' => 'pants1.png',
                'name' => 'Blue Regular Jeans',
                'description' => '5-pocket jeans in stretch denim with a regular waist, zip fly and button and straight legs with good room for movement over the thighs and knees.',
                'price' => 140000,
                'stock' => 80,
                'created_at' => Carbon::now()
            ],
            [
                'image' => 'pants2.png',
                'name' => 'Dark Regular Jeans Type-1',
                'description' => "Jeans that are left unwashed are called raw or dry denim, which offers a deep, dark shade.",
                'price' => 140000,
                'stock' => 60,
                'created_at' => Carbon::now()
            ],
            [
                'image' => 'pants3.png',
                'name' => 'Dark Regular Jeans Type-2',
                'description' => 'Jeans that are left unwashed are called raw or dry denim, which offers a deep, dark shade.',
                'price' => 140000,
                'stock' => 56,
                'created_at' => Carbon::now()
            ],
            [
                'image' => 'pants4.png',
                'name' => 'Ripped Blue Jeans',
                'description' => "It's a pair of jeans which features a frayed, worn look, and has distinct ripped spaces, often at the knees, where the skin peeps out. These 'rips' can occur by overuse, or can be created at home in a DIY fashion with a blade or a pair of scissors.",
                'price' => 140000,
                'stock' => 70,
                'created_at' => Carbon::now()
            ],
            [
                'image' => 'pants5.jpg',
                'name' => 'Wide-leg Jeans',
                'description' => 'Wide-leg jeans differ from bell-bottoms in that the entire length of the leg is large in circumference whereas flare or bell-bottom jeans become wider below the knee. Wide-leg jeans can be considered to be a variant of baggy jeans, which were also popular in the 1990s',
                'price' => 170000,
                'stock' => 60,
                'created_at' => Carbon::now()
            ],

            //short_jeans
            [
                'image' => 'short_jeans1.jpg',
                'name' => 'Ripped Blue Short Jeans',
                'description' => 'Every guy needs a versatile denim short. This regular washed mid rise stretch ripped jean shorts is great for hot days and classic in summer outfit as well.',
                'price' => 350000,
                'stock' => 90,
                'created_at' => Carbon::now()
            ],
            [
                'image' => 'short_jeans2.jpg',
                'name' => 'Black Short Jeans',
                'description' => "The No Excess denim shorts are executed in a regular fit that sits comfortably on the thigh and a slim leg. The dark denim color is a special blue denim tone. The added stretch makes the shorts very comfortable to wear. The characteristic No Excess details add the finishing touches.",
                'price' => 350000,
                'stock' => 70,
                'created_at' => Carbon::now()
            ],
            [
                'image' => 'short_jeans3.jpg',
                'name' => 'Ripped Dark Blue Jeans',
                'description' => 'Every guy needs a versatile dark-blue shorts. This regular washed mid rise stretch ripped jean shorts is great for hot days and classic in summer outfit as well.',
                'price' => 45000,
                'stock' => 50,
                'created_at' => Carbon::now()
            ],
            [
                'image' => 'short_jeans4.jpg',
                'name' => 'Blue Regular Short Jeans (Woman)',
                'description' => 'Denim shorts, as you may have guessed, are partial-length trousers — also known as shorts — that also feature a denim construction. They are usually made of the same denim material as jeans.',
                'price' => 300000,
                'stock' => 60,
                'created_at' => Carbon::now()
            ],
            [
                'image' => 'short_jeans5.jpg',
                'name' => 'Light Short Jeans (Woman)',
                'description' => 'Shredded hems add to the vintage vibe of nonstretch denim shorts designed with a classic button fly and an edgy summertime look.',
                'price' => 200000,
                'stock' => 86,
                'created_at' => Carbon::now()
            ]
        ];
        DB::table('items')->insert($items);
    }
}
