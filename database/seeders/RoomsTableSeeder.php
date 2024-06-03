<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoomsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('rooms')->insert([
            [
                'name' => 'Standard Room',
                'description' => 'Experience comfort and convenience in our well-appointed Standard Room, designed for both business and leisure travelers. Our Standard Rooms offer a cozy and modern ambiance, ensuring a restful stay. Whether you\'re here for a short stay or an extended visit, our Standard Rooms provide all the essentials you need for a relaxing and productive stay.',
                'price' => 200.00,
                'images' => json_encode([
                    'images/StandardRoom1.jpg',
                    'images/StandardRoom2.jpg',
                    'images/StandardRoom3.jpg',
                ]),
            ],
            [
                'name' => 'Deluxe Room',
                'description' => 'Upgrade your stay with our Deluxe Room, offering extra space and enhanced amenities for a more luxurious experience. Perfect for those who appreciate a touch of elegance and added comfort. Enjoy the perfect blend of comfort and style in our Deluxe Room, designed to make your stay truly memorable.',
                'price' => 280.00,
                'images' => json_encode([
                    'images/DeluxeRoom1.jpg',
                    'images/DeluxeRoom2.jpg',
                    'images/DeluxeRoom3.jpg',
                ]),
            ],
            [
                'name' => 'Superior Room',
                'description' => 'Indulge in the added space and refined comfort of our Superior Room, perfect for guests seeking a more luxurious and relaxing stay. With premium amenities and elegant decor, our Superior Rooms provide an elevated experience. Experience the perfect balance of luxury and comfort in our Superior Room, designed to exceed your expectations.',
                'price' => 400.00,
                'images' => json_encode([
                    'images/SuperiorRoom1.jpg',
                    'images/SuperiorRoom2.jpg',
                    'images/SuperiorRoom3.jpg',
                ]),
            ],
            [
                'name' => 'Suite',
                'description' => 'Elevate your stay with our luxurious Suite, offering expansive space and top-tier amenities for an unforgettable experience. Ideal for families, business travelers, or anyone seeking the ultimate in comfort and style. Experience unparalleled luxury and comfort in our Suite, designed to provide a home away from home.',
                'price' => 350.00,
                'images' => json_encode([
                    'images/Suite1.jpg',
                    'images/Suite2.jpg',
                    'images/Suite3.jpg',
                ]),
            ],
        ]);
    }
}
